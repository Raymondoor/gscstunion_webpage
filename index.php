<?php
//Functional files below
$dir_back = "";
require_once "{$dir_back}backend/app/lib/init.php";
require_once "{$dir_back}backend/app/config/init.php";
//GUI files below
$pageTitle = "GSC学生連合 | 地球社会共生学部 | 青山学院大学";
//header
include "{$dir_back}backend/app/views/header.php";
?>

    <main>
        <div id="home-banner">
            <h2>GSC Stunion</h2>
            <h3>地球社会共生学部学生連合</h3>
            <h4>青山学院大学</h4>
        </div>
    </main>

<?php
//footer
include "{$dir_back}backend/app/views/footer.php";
?>