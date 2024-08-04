    <footer>
        <div id="f-links">
            <div id="f-main-link">
                <p><a href="https://www.aoyama.ac.jp/faculty/gsc/">地球社会共生学部&#8663</a></p><br>
                <p><a href="https://www.aoyama.ac.jp/">青山学院大学&#8663</a></p>
            </div>
            <div id="f-access">
                <p><a href="https://maps.app.goo.gl/T55JukdbwNe2TcaY6" target="_blank">
                    〒252-5258<br> 
                    神奈川県相模原市中央区<br>
                    淵野辺 5-10-1&#8663
                </a></p>
            </div>
        </div>
        <br>
        <div id="fnavbar">
            <div id="license">
                GSC 学生連合<br>
                gscstunion@aoyama.jp<br>
                <?php echo date("Y"); ?> &#169 All rights reserved
            </div>
            <div id="f-sns-link">
                <a href="<?php echo $Instagram; ?>" target="_blank" title="Instagram"><img src="<?php echo $dir_back; ?>assets/images/icon/Instagram.png" alt="Instagram" class="sns_image"></a>
                <a href="<?php echo $X; ?>" target="_blank" title="X(Twitter)"><img src="<?php echo $dir_back; ?>assets/images/icon/X.png" alt="X(Twitter)" class="sns_image"></a>
            </div>
        </div>
        <div id="back2top">
            <button id="b2t" title="ページの先頭に戻る"><img src="<?php echo $dir_back; ?>assets/images/uparrow.png" alt="ページの先頭に戻る" id="b2timg"></button>
        </div>
    </footer>
    <script src="<?php echo $dir_back; ?>assets/js/index.js"></script>
    <?php 
    // call a specific script for each directory or page
    function loadScript($dir) {
        switch ($dir) {
            case 'home':
                echo "";
                break;
            case 'articles':
                echo "<script src=\"../assets/js/lib/sort-article.js\"></script>";
                break;
            case 'admin':
                echo "";
                break;
            case 'login':
                echo "";
                break;
        }
    }
    loadScript($dir);
    ?>
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "EducationalOrganization",
        "name": "地球社会共生学部　学生連合",
        "alternateName": "gscstunion",
        "url": "https://www.cc.aoyama.ac.jp/~gscstunion/",
        "logo": "https://www.cc.aoyama.ac.jp/~gscstunion/assets/images/icon/GSC_logo.png",
        "description": "地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "5-10-1 Fuchinobe",
            "addressLocality": "Sagamihara",
            "addressRegion": "Kanagawa",
            "postalCode": "252-5258",
            "addressCountry": "JP"
        },
    }
    </script>

</body>
</html>