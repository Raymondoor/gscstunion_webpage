<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER["REQUEST_METHOD"] === 'POST' && csrf_gate('seo')){
    // Update existing SEO entries
    $data = [
        'Organization' => validate($_POST['Organization']),
        'Alias' => validate($_POST['Alias']),
        'School' => validate($_POST['School']),
        'Faculty' => validate($_POST['Faculty']),
        'Keywords' => validate($_POST['Keywords']),
        'FoundDate' => [
            'Year' => validate($_POST['FoundDate']['Year']),
            'Month' => validate($_POST['FoundDate']['Month']),
            'Day' => validate($_POST['FoundDate']['Day'])
        ],
        'Location' => [
            'Building' => validate($_POST['Location']['Building']),
            'Street' => validate($_POST['Location']['Street']),
            'City' => validate($_POST['Location']['City']),
            'Prefecture' => validate($_POST['Location']['Prefecture']),
            'Country' => validate($_POST['Location']['Country']),
            'Country-Code' => validate($_POST['Location']['Country-Code']),
            'Post' => validate($_POST['Location']['Post'])
        ],
        'Members' => validate($_POST['Members']),
        'Description' => validate($_POST['Description']),
        'Google-SEO' => $_POST['google'],
        'Bing-SEO' => $_POST['bing']
    ];
    $jsoned = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    if(file_put_contents(DATA_DIR.'/json/SEO.json', $jsoned) == true){
        return_header('/admin/edit/seo.php?message=Successfully_Updated!');
    }else{
        return_header('/admin/edit/seo.php?error=My_Bad');
    }
}