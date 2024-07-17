<?php
//Functional files below
$dir_back = "../";
require_once "{$dir_back}backend/app/lib/init.php";
require_once "{$dir_back}backend/app/config/init.php";
//GUI files below
$pageTitle = "GSC Stunion Editor Page";
//header
include "{$dir_back}backend/app/views/header.php";
?>

    <main>
        <h2>admin page</h2>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>