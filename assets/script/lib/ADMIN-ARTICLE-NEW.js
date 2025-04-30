const BlockEmbed = Quill.import('blots/block/embed'); // Use block/embed for iframes
const Block = Quill.import('blots/block');

class YouTubeBlot extends BlockEmbed {
  static create(value) {
    // Validate the URL before creating the blot
    if (!value || !value.url || !value.url.startsWith('https://www.youtube.com/embed/')) {
      return document.createElement('p'); // Fallback to plain <p> if invalid
    }

    let node = super.create();
    node.setAttribute('data-youtube', value.url); // Store URL in a data attribute
    let iframe = document.createElement('iframe');
    iframe.setAttribute('src', value.url);
    iframe.setAttribute('frameborder', '0');
    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
    iframe.setAttribute('allowfullscreen', '');
    node.appendChild(iframe);
    return node;
  }

  static value(node) {
    const url = node.getAttribute('data-youtube');
    return url ? { url } : {};
  }

  static formats(node) {
    const url = node.getAttribute('data-youtube');
    return url ? { url } : {};
  }
}
YouTubeBlot.blotName = 'youtube';
YouTubeBlot.tagName = 'div';
YouTubeBlot.className = 'ql-youtube-embed';
Quill.register(YouTubeBlot);

class DividerBlot extends Block {
  static blotName = "divider";
  static tagName = "hr";
  static create(value) {
    let node = super.create(value);
    // give it some margin
    node.setAttribute('style', "margin:1rem !important;");
    return node;
}
}
Quill.register(DividerBlot);

const quill = new Quill('#editor', {
    
    modules: {
    toolbar: [
        [{align:[]}, {header: [2, 3, false]}],
        [{'color': []}, 'bold', 'italic', 'underline', 'strike'],
        ['link', 'divider', 'blockquote', 'code-block', 'image', 'youtube'],
        [{ list: 'ordered' }],
    ],
    },
    theme: 'snow',
});
quill.getModule('toolbar').addHandler('youtube', function(){
    const url = prompt('Enter a YouTube URL:');
    if(url){
        const embedUrl = convertToEmbedUrl(url);
        if(embedUrl){
            const range = quill.getSelection(true); // Get current cursor position
            quill.insertEmbed(range.index, 'youtube', { url: embedUrl }, Quill.sources.USER);
        }else{
            alert('Invalid YouTube URL!');
        }
    }
});
document.querySelector('.ql-youtube').innerHTML = ''; // Clear default content
const youtubeImg = document.createElement('img');
youtubeImg.src = 'https://img.icons8.com/ios-filled/24/000000/youtube-play.png'; // Icon URL
youtubeImg.alt = 'YouTube';
youtubeImg.style.width = '18px'; // Match typical Quill icon size
youtubeImg.style.height = '18px';
document.querySelector('.ql-youtube').appendChild(youtubeImg);

document.querySelector('.ql-divider').innerHTML = ''; // Clear default content
const hrImg = document.createElement('img');
hrImg.src = '../../assets/image/share/bits/hr.png'; // Icon URL
hrImg.alt = 'Dividing Line';
hrImg.style.width = '18px'; // Match typical Quill icon size
hrImg.style.height = '18px';
document.querySelector('.ql-divider').appendChild(hrImg);

var editor = document.getElementById('editor');
var editorInput = document.getElementById('editorInput');

function adjustEditorHeight(){
    const qlEditor = editor.querySelector('.ql-editor');
    // Reset height to auto to get the true content height
    qlEditor.style.height = 'auto';
    // Set the height to match the scrollHeight (total content height)
    qlEditor.style.height = `${qlEditor.scrollHeight}px`;
}
quill.on('text-change', function(delta, oldDelta, source) {    
    var editorHtml = editor.querySelector('.ql-editor').innerHTML;
    editorInput.value = editorHtml;
    adjustEditorHeight();
});

  
// Helper function to convert YouTube URL to embed format
function convertToEmbedUrl(url){
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    const match = url.match(regExp);
    if(match && match[2].length === 11){
        return `https://www.youtube.com/embed/${match[2]}`;
    }
    return null;
}

document.getElementById('thumb').addEventListener('change', (e) =>{
    const file = e.target.files[0];
    if(!file){
        document.getElementById('preview').src = "";
        return;
    }
    const reader = new FileReader();
    reader.onload = (e) =>{
      document.getElementById('preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
});
document.getElementById("newart").addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault(); // Stops the form from submitting
  }
});
function checkFileSize(input) {
  const maxSize = 819200; // 2MB in bytes
  if (input.files[0] && input.files[0].size > maxSize) {
    alert("ファイルサイズが大きすぎます！");
    input.value = ""; // Clear the input
  }
}