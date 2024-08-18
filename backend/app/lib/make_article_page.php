<?php
include "get_article.php";
include(__DIR__ . '/../config/init.php');
function make_article_page($articles) {
    foreach ($articles as $key => $article) {

        // Define the filename based on the article ID
        $filename = HOME_DIR . "/articles/page/a" . $article['id'] . ".php";

        // Prepare the content for the file
        $fileContent = '<' . '?php' . "\n";
        $fileContent .= '$dir_back = "../../";' . "\n";
        $fileContent .= '$dir = "page";' . "\n";
        $fileContent .= 'require_once "{$dir_back}backend/app/lib/init.php";' . "\n";
        $fileContent .= 'require_once "{$dir_back}backend/app/config/init.php";' . "\n";
        $fileContent .= '$pageTitle = "' . addslashes($article['title']) . '";' . "\n";
        $fileContent .= 'include "{$dir_back}backend/app/views/header.php";' . "\n";
        $fileContent .= '?' . '>' . "\n\n";
        $fileContent .= '    <main>' . "\n";
        $fileContent .= '       <div id="pa">' . "\n";
        $fileContent .= '           <h2 id="patitle"><?php echo $pageTitle; ?></h2>' . "\n";
        $fileContent .= '           <p id="padate">' . htmlspecialchars($article['date']) .'</p>' . "\n";
        $fileContent .= '           <p id="pamain">' . htmlspecialchars($article['main']) . '</p>' . "\n";  // Output full article or adapt as necessary
        $fileContent .= '           <br>' . "\n";
        
        if (!empty($article['url'])) {
            if (strpos($article['url'], 'youtu.be') !== false || strpos($article['url'], 'youtube.com') !== false) {
                // Extract the YouTube video ID and embed it
                preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([^"\&\?\/\s]{11})/i', $article['url'], $matches);
                $videoId = $matches[1];
                $fileContent .= '           <div class="iframe-container">' . "\n";
                $fileContent .= '               <iframe class="iframe" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>' . "\n";
                $fileContent .= '           </div>' . "\n";
            } elseif (strpos($article['url'], 'x.com') !== false) {
                // Specific content for x.com
                $fileContent .= '       <div>Special content for x.com here</div>' . "\n";
            } else {
                $fileContent .= '       <p><a href="' . $article['url'] . '" title="Go to Link">' . $article['url'] . '</a></p>' . "\n";
            }
        } else {
            $fileContent .= "\n";
        }
        if (!empty($article['media'])) {
            $base64 = base64_encode($article['media']);
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($article['media']);
            $fileContent .= '           <img src="data:' . $mimeType . ';base64,' . $base64 . '" alt="Article Image" />' . "\n";
        }
        

        $fileContent .= '           <br>' . "\n";
        $fileContent .= '       </div>' . "\n";
        $fileContent .= '    </main>' . "\n";
        $fileContent .= '<' . '?php' . "\n";
        $fileContent .= 'include "{$dir_back}backend/app/views/footer.php";' . "\n";


        // Write the file
        file_put_contents($filename, $fileContent);
    };
}
make_article_page($articles);