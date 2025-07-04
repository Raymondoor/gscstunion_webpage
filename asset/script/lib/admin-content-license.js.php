<script src="<?=SCRIPT_URL?>/imageInput.js"></script>
<script src="<?=SCRIPT_URL?>/quill/quill.js"></script>
<script>
const BlockEmbed = Quill.import('blots/block/embed');
const Delta = Quill.import('delta');
const Font = Quill.import('formats/font');
Font.whitelist = ['zen-maru', 'zen-kaku', 'zen-min'];
Quill.register(Font, true);
const toolbarOptions =[
    [{ font: Font.whitelist}],
    [{'header':[2,3,false]},{'size':['small',false,'large']}],
    ['bold','italic','underline','strike'],
    [{'align':[]}],
    ['link','image'],
    [{'list':'ordered'},{'list':'bullet'}],
    [{'indent':'-1'},{'indent':'+1'}],
];
const quill = new Quill('#editor',{
    theme: 'snow',
    modules:{
        toolbar:{
            container:toolbarOptions,
            handlers:{
                image: function(){
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.click();
                    input.onchange =()=>{
                        const file = input.files[0];
                        if(!file) return;
                        const reader = new FileReader();
                        reader.onload =() =>{
                            const base64 = reader.result;
                            const range = quill.getSelection(true);
                            quill.insertEmbed(range.index, 'image', base64, Quill.sources.USER);
                        };
                        reader.readAsDataURL(file);
                    };
                }
            }
        }
    },
});
const toolbar = quill.getModule('toolbar');
quill.on('text-change',()=>{
    let cont = quill.getSemanticHTML();
    document.getElementById('hiddenMain').value = cont;
    const delta = quill.getContents();
    localStorage.setItem('quill-delta-license', JSON.stringify(delta));
})
const saved = localStorage.getItem('quill-delta-license');
if(saved){
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
function formreset(){
    console.log('reset');
    localStorage.setItem('quill-delta-license', '');
    location.reload();
}
</script>