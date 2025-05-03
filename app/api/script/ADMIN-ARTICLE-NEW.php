<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/LINK.php');
?>
<script>
    $(document).ready(function (){
        $('#newhash').keyup(function(){
            var input = $('#newhash').val();
            $.post("<?=FORM_URL.'/adm-hashnew.php'?>",{
                newhash: input
            }, function(result){
                $("#match").html(result);
            });
        })
    });
    function selectOption(id){
        $("#hid").val(id);
        $("#match").html('');
        $("#newhash").val('');
    }
    function preview(){
        $('#prvdiv').html('<h2>ロード中...</h2>');
        var pval = $('#projectid').find('option:selected').val() === '' ? 'プロジェクト' : $('#projectid').find('option:selected').text();
        var title = $('#title').val() == '' ? 'タイトル' : $('#title').val();
        var content = $('#editorInput').val() == '' ? '本文' : $('#editorInput').val();
        var hval = $('#hid').find('option:selected').val() === '' ? '#'+$('#newhash').val() : $('#hid').find('option:selected').text();
        var thumb = typeof($('#preview').attr('src')) === 'undefined' ? '' : $('#preview').attr('src');
        $.post("<?=FORM_URL.'/adm-artprev.php'?>",{
            project: pval,
            title: title,
            date: "<?=date("Y-m-d")?>",
            cat: hval,
            thumb: thumb,
            main: content,
        }, function(result){
            $('#prvdiv').html(result);
        });
        
    }
    $("#showPrevBtn").on('click', preview);
    $("#showPrevBtn").on('click', function(){
        $("#prvdiv").css("display", "block")
    });
</script><?=PHP_EOL?>