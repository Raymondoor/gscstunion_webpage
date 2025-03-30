<?php $title='開発者ツール';
$file='ADMIN'.'-'.'STATUS';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();
include_once(TEMPLATE_DIR.'/header.php');
$_SESSION['serverdate'] = date('l jS \of F Y h:i:s A');
?>

<main>
    <ul>
        <li><h3><a href="./phpinfo.php">phpinfo()</h3></a></li>
        <li><h3><a href="./dev.php">dev</h3></a></li>
        <li><h3>$_SESSION</h3>
            <ul>
<?php
foreach($_SESSION as $index => $value){ ?>
            <li><b><?=$index?></b> => <?=$value?></li>
<?php } ?>
            </ul>
        </li>
        <li><h3>$_SERVER</h3>
            <ul>
<?php
foreach($_SERVER as $index => $value){ ?>
            <li><b><?=$index?></b> => <?=$value?></li>
<?php } ?>
            </ul>
        </li>
    </ul>
</main>
<?php unset($_SESSION['serverdate']);