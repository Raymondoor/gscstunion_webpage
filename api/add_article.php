<?php
include(__DIR__ . '/../backend/app/lib/make_article_page.php');
include(__DIR__ . '/../backend/app/lib/delete_article_page.php');
// Define the path to the SQLite database file
$databasePath = __DIR__ . '/../backend/data/database.db';

// Create a new PDO instance for SQLite
try {
    $pdo = new PDO('sqlite:' . $databasePath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $date = date("Y-m-d");
    $main = htmlspecialchars($_POST['main'], ENT_QUOTES, 'UTF-8');
    $url = isset($_POST['url']) ? htmlspecialchars($_POST['url'], ENT_QUOTES, 'UTF-8') : ''; // Check if URL is provided
    $userId = 1;  // Assuming a fixed user_id for now, adjust as necessary
    
    // Assume no file or handle the file below
    if (isset($_FILES['media'])) {
        if ($_FILES['media']['error'] === UPLOAD_ERR_OK) {
            $media = file_get_contents($_FILES['media']['tmp_name']);
            if ($media === false) {
                echo "Failed to read file contents.<br>";
            } else {
                echo "File size: " . strlen($media) . " bytes<br>";
            }
        } else {
            echo "File upload error: " . $_FILES['media']['error'] . " - " . upload_error_message($_FILES['media']['error']) . "<br>";
        }
    } else {
        $media = null;
    }
    
    function upload_error_message($code) {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return "File too large";
            case UPLOAD_ERR_PARTIAL:
                return "File only partially uploaded";
            case UPLOAD_ERR_NO_FILE:
                return "No file uploaded";
            case UPLOAD_ERR_NO_TMP_DIR:
                return "No temporary directory";
            case UPLOAD_ERR_CANT_WRITE:
                return "Failed to write file to disk";
            case UPLOAD_ERR_EXTENSION:
                return "File upload stopped by extension";
            default:
                return "Unknown upload error";
        }
    }
    

    // SQL to insert the new article
    $sql = "INSERT INTO article (title, user_id, date, main, url, media) VALUES (:title, :userId, :date, :main, :url, :media)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':main', $main);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':media', $media, PDO::PARAM_LOB);
    $stmt->bindParam(':userId', $userId);

    if ($stmt->execute()) {
        // Fetch the latest inserted article data for page creation
        $articleId = $pdo->lastInsertId();
        $stmt = $pdo->prepare("SELECT * FROM article WHERE id = ?");
        $stmt->execute([$articleId]);
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        make_article_page($articles);
        delete_orphaned_article_pages();
    } else {
        echo "Error submitting article.";
    }
}
