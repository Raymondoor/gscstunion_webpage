<?php
$databasePath = __DIR__ . "../../../data/database.db";


try {
    $pdo = new PDO("sqlite:$databasePath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}


$stmt = $pdo->query("SELECT * FROM article");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
