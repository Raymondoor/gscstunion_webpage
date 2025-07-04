<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\BaseController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$data = [
    'Organization' => htmlspecialchars($_POST['Organization']),
    'Alias' => htmlspecialchars($_POST['Alias']),
    'School' => htmlspecialchars($_POST['School']),
    'Faculty' => htmlspecialchars($_POST['Faculty']),
    'Keywords' => htmlspecialchars($_POST['Keywords']),
    'FoundDate' => [
        'Year' => htmlspecialchars($_POST['FoundDate']['Year']),
        'Month' => htmlspecialchars($_POST['FoundDate']['Month']),
        'Day' => htmlspecialchars($_POST['FoundDate']['Day'])
    ],
    'Location' => [
        'Building' => htmlspecialchars($_POST['Location']['Building']),
        'Street' => htmlspecialchars($_POST['Location']['Street']),
        'City' => htmlspecialchars($_POST['Location']['City']),
        'Prefecture' => htmlspecialchars($_POST['Location']['Prefecture']),
        'Country' => htmlspecialchars($_POST['Location']['Country']),
        'Country-Code' => htmlspecialchars($_POST['Location']['Country-Code']),
        'Post' => htmlspecialchars($_POST['Location']['Post'])
    ],
    'Members' => htmlspecialchars($_POST['Members']),
    'Description' => htmlspecialchars($_POST['Description']),
    'Google-SEO' => $_POST['google'],
    'Bing-SEO' => $_POST['bing']
];
$result = BaseController::update($data);
if($result === -3){
    sethtmlmessage('エラーが発生しました。');
    header('Location: '.referer());
    exit;
}elseif($result === 0){
    sethtmlmessage('正常に更新されました。');
    return_header('/admin/success.php');
    exit;
}