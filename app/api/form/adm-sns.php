<?php
require_once (__DIR__ . '/../general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/brand.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Update existing SNS entries
    $input = [];
    foreach ($_POST['sns'] as $sns => $details) {
        $input['SNS'][$details['Tag']] = [
            'Title' => $details['Title'],
            'Username' => $details['Username'],
            'Link' => $details['Link']
        ];
        if (isset($details['Delete'])) {
            unset($input['SNS'][$details['Tag']]);
        }
    }
    

    // Add new SNS entry if provided
    if (isset($_POST['new'])) {
        $newallclear = true;
        foreach ($_POST['new'] as $newdetails) {
            if (empty($newdetails)) {
                $newallclear = false;
                break;
            }
        }
        if ($newallclear) {
            $input['SNS'][$_POST['new']['Tag']] = [
                'Title' => $_POST['new']['Title'],
                'Username' => $_POST['new']['Username'],
                'Link' => $_POST['new']['Link']
            ];
        }
    }

    $ALLSEO = list_seo();
    $ALLSEO['SNS'] = $input['SNS'];
    // Write updated JSON back to file
    $jsonUpdated = json_encode($ALLSEO, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    if (file_put_contents(DATA_DIR . '/SEO.json', $jsonUpdated) === false) {
        return_header('/admin/sns?error=My_Bad');
    } else {
        return_header('/admin');
    }
    
}