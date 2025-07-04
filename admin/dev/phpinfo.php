<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\referer;
UserAuth::admin_gate();?>
<a href="<?=referer()?>"style="position:fixed;bottom:2rem;right:2rem;padding:0.5rem;border-radius:0.25rem;z-index:100;font-size: 1.25rem;color:#fff;background-color:#599;box-shadow:1px 1px 5px #777;">前のページへ戻る</a>
<?php phpinfo();