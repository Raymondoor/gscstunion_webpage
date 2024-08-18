<?php
include "get_article.php";
include(__DIR__ . '/../config/init.php');
function delete_orphaned_article_pages() {
    global $pdo; // Ensure your PDO connection is accessible

    $directory = HOME_DIR . "/articles/page/";
    $files = scandir($directory);
    $idsToCheck = [];

    // Extract IDs from filenames
    foreach ($files as $file) {
        if (preg_match('/a(\d+)\.php$/', $file, $matches)) {
            $idsToCheck[] = $matches[1];
        }
    }

    // Prepare and execute a single query to find existing IDs
    if (!empty($idsToCheck)) {
        $placeholders = implode(',', array_fill(0, count($idsToCheck), '?'));
        $stmt = $pdo->prepare("SELECT id FROM article WHERE id IN ($placeholders)");
        $stmt->execute($idsToCheck);
        $existingIds = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        // Determine which IDs are not in the database
        $nonExistingIds = array_diff($idsToCheck, $existingIds);

        // Delete files for non-existing IDs
        foreach ($nonExistingIds as $id) {
            $filename = $directory . "a" . $id . ".php";
            if (file_exists($filename)) {
                unlink($filename);
                echo "Deleted orphaned file: $filename<br>";
            }
        }
    } else {
        echo "No article files found to check.<br>";
    }
}

// Call the function
delete_orphaned_article_pages();
