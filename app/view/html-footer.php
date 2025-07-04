<?php
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\loadAsset;
?>
<footer>
    <p><a href="https://github.com/Raymondoor/gscstunion_webpage">&copy; <?=date('Y')==='2024'?'':'2024-'?><?=date('Y')?></a></p>
    <p><?=UserAuth::ip_gate()?'<a href="'.ADMIN_URL.'/" tabindex="-1">'.APP_NAME.'</a>':APP_NAME?></p>
</footer>
<script src="<?=SCRIPT_URL?>/jquery-3.7.1.min.js"></script>
<?php include_once(PUBLIC_DIR.'/asset/script/script.js.php');?>
<?=loadAsset('script')?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "EducationalOrganization",
    "name": "<?=APP_NAME?>",
    "alternateName": "<?=$BASE['Alias']?>",
    "url": "<?=CURRENT_URL?>",
    "logo": "<?=IMAGE_URL?>/brand/logo2.jpg",
    "description": "<?=$BASE['Description']?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?=$BASE['Location']['Street']?>",
        "addressLocality": "<?=$BASE['Location']['City']?>",
        "addressRegion": "<?=$BASE['Location']['Prefecture']?>",
        "postalCode": "<?=$BASE['Location']['Post']?>",
        "addressCountry": "<?=$BASE['Location']['Country-Code']?>"
    }
}
</script>
</body>
</html>