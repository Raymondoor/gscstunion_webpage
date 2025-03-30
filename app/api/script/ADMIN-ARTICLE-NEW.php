<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/LINK.php');
?>
<script>
    $(document).ready(function () {
        $('#newhash').keyup(function(){
            var input = $('#newhash').val();
            $.post("<?=FORM_URL.'/adm-hashnew.php'?>",{
                newhash: input
            }, function(result){
                $("#match").html(result);
            });
        })
    });
    function selectOption(id) {
        $("#hid").val(id);
        $("#match").html('');
        $("#newhash").val('');
    }
</script><?=PHP_EOL?>