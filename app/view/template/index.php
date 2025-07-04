<?php require_once(__DIR__.'/vendor/autoload.php'); // Copy the file and paste it where it belongs. change autoload path accordingly.
use function Raymondoor\Func\pageconfig;
// Functions and loaded data here.
pageconfig([ // This will setup a value of $PAGE. There is a default value in env file, which overrides with this function.
    'TITLE' => 'Title', // This will be displayed in <title></titile>
    'INDEX' => 'index' // This is used to tell what style/script file to use, or as a reference to load specific data. Do not use characters that cannot be used as directory or path, such as "/" and "?"
]);

// Until here. keep above the html content. (as much as you can)
include_once(VIEW_DIR.'/html-head.php'); // These are HTML components, there is not restriction to filenames, the examples are as such just for clarity.
include_once(VIEW_DIR.'/html-header.php'); // In fact you can even save functions to the VIEW_DIR if you want to, but will become harder to maintain yourself.
?>
<main>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php'); // These files inside VIEW_DIR are not required, it is just there as templates to avoid repetition of html.