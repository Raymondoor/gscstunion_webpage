<?php require_once(__DIR__.'/../vendor/autoload.php');

use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\sethtmlmessage;

$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->addScope('email');
$client->addScope('profile');

if(!isset($_GET['code'])){
    $auth_url = $client->createAuthUrl();
    header('Location: '.filter_var($auth_url, FILTER_SANITIZE_URL));
    exit;
}
$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);

// Get ID token data
$oauth_info = $client->verifyIdToken();
if(!$oauth_info){
    die("Failed to verify ID token.");
}
// Extract user info
$oauth_provider = 'google';
$oauth_uid = $oauth_info['sub'];
$name = $oauth_info['name'] ?? '';
$email = $oauth_info['email'] ?? '';
$picture_url = $oauth_info['picture'] ?? '';

// Upsert user in DB & save to session
$result = UserAuth::loginGU($oauth_provider,$oauth_uid,$name,$email,$picture_blob);
if($result===1){
    sethtmlmessage('このアカウントは許可されていません。');
    return_header('/admin/');
}
return_header('/admin/');exit;