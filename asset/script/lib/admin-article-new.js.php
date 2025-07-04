<script src="<?=SCRIPT_URL?>/imageInput.js"></script>
<script src="<?=SCRIPT_URL?>/quill/quill.js"></script>
<script>
const BlockEmbed = Quill.import('blots/block/embed');
const Delta = Quill.import('delta');
</script>
<script src="<?=SCRIPT_URL?>/quill/hr.js"></script>
<script src="<?=SCRIPT_URL?>/quill/youtube.js"></script>
<script>
// thumbnail class
new inputImageRender;

//quill stuff
Quill.register(HrBlot, true);
Quill.register(YoutubeBlot, true);
const toolbarOptions = [
    [{ 'header': [2, 3, false] }],
    [{ 'color': [] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ 'align': [] }, 'hr'],
    ['link', 'image', 'yt'],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],
];
const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: toolbarOptions
    },
});
const toolbar = quill.getModule('toolbar');
toolbar.addHandler('hr', HrBlot.logic);
toolbar.addHandler('yt', YoutubeBlot.logic.bind(YoutubeBlot));
HrBlot.button();
YoutubeBlot.button();

quill.on('text-change',()=>{
    let cont = quill.getSemanticHTML();
    document.getElementById('hiddenMain').value = cont;
    const delta = quill.getContents();
    localStorage.setItem('quill-delta', JSON.stringify(delta));
})
const saved = localStorage.getItem('quill-delta');
if (saved) {
    quill.setContents(JSON.parse(saved));
}
quill.clipboard.addMatcher(Node.ELEMENT_NODE,(node, delta) =>{
    const disallowedStyles = ['font-size', 'background-color', 'color', 'font-family'];
    for(const styleName of disallowedStyles){
        if(node.style && node.style[styleName]){
            return new Delta().insert(node.textContent); // strip if any disallowed style is found
        }
    }
    return delta;
});

// else
document.getElementById("new-article-form").addEventListener("keypress", function(event){
    if(event.key === "Enter"){
        event.preventDefault(); // Stops the form from submitting
    }
});
function findCategory(value){
    if(!value){
        $('#newcatresult').empty();
        return;
    }
    $.post("<?=POST_URL?>ajax-category",{
        'value': value
    }, function(result){
        $('#newcatresult').html(result);
    });
}
function selectOption(id){
    $("#categoryOption").val(id);
    $("#newcatresult").html('');
    $("#newcat").val('');
}
//preview
function preview(){
    $('#prvdiv').css('display', 'block');
    $('#prvdiv').html('<h2 style="text-align:center;">ロード中...</h2>');
    var pval = $('#projectOption').find('option:selected').val() === '' ? '' : $('#projectOption').find('option:selected').val();
    var title = $('#title').val() == '' ? 'タイトル' : $('#title').val();
    var content = $('#hiddenMain').val() == '' ? '本文' : $('#hiddenMain').val();
    var hval = $('#categoryOption').find('option:selected').val() === '' ? '#'+$('#newcat').val() : $('#categoryOption').find('option:selected').text();
    var thumb = $('#imageInput').css('background-image') == '' ? '' : $('#imageInput').css('background-image');
    $.post("<?=POST_URL?>ajax-preview",{
        'project': pval,
        'title': title,
        'date': "<?=date("Y-m-d")?>",
        'cat': hval,
        'thumb': thumb,
        'main': content,
    }, function(result){
        $('#prvdiv').html(result);
    });
}
// run
$('#prvbtn').on('click', preview);
$('#newcat').keyup(function(){
    findCategory($(this).val());
    $('#newcatresult').css('display', 'block');
})
</script>