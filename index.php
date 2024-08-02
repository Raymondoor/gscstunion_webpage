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
        <div id="aboutus">
            <div id="slogan">
                <h2>今日の挑戦、<br>明日の共生。</h2>
            </div>
            <div id="au-description">
                <p>地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。
                    盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。</p>
            </div>
        </div>
        <hr>
        <div id="socialpage">
            <div id="socialpagenav">
                <a href="<?php echo $Instagram; ?>" target="_blank" title="Instagram">
                <img src="<?php echo $dir_back; ?>assets/images/icon/WInstagram.png" alt="Instagram" class="socialpagelogo">Instagram</a>
                <a href="<?php echo $X; ?>" target="_blank" title="Instagram">
                <img src="<?php echo $dir_back; ?>assets/images/icon/WX.png" alt="Instagram" class="socialpagelogo">X</a>
            </div>
        </div>
    </main>

<?php
//footer
include "{$dir_back}backend/app/views/footer.php";
?>