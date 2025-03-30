<?php require_once(__DIR__.'/../api/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');

// Dateabase "database.db" is configured by default. No need to create any tables. Run this in cli to register your user
$usrnm = str_rot13(''); // Username
$pswrd = password_hash('', PASSWORD_DEFAULT); // Password
$query = new DatabaseStatement("INSERT INTO user (username, password) VALUES (:username, :password)");
$result = $query->Operation([':username' => $usrnm, ':password' => $pswrd]);
echo $result; // should return "1" as int