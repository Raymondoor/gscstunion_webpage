<?php
require_once (__DIR__ . '/../general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csfr'], $_POST['csfr'])) {
        die('Invalid Access');
    }
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $query = new DatabaseStatement("SELECT * FROM user WHERE id = :id");
        $result = $query->Operation([':id' => 1]);
    }
}