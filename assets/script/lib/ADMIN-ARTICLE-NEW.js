const Block = Quill.import('blots/block');

class YouTubeBlot extends Block {
  static create(value) {
    let node = super.create();
    // Create the iframe
    let iframe = document.createElement('iframe');
    iframe.setAttribute('src', value.url);
    iframe.setAttribute('frameborder', '0');
    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
    iframe.setAttribute('allowfullscreen', '');
    // Wrap it in a <p> tag
    node.appendChild(iframe);
    return node;
  }

  static value(node) {
    const iframe = node.querySelector('iframe');
    return {
      url: iframe ? iframe.getAttribute('src') : ''
    };
  }

  static formats(node) {
    const iframe = node.querySelector('iframe');
    return iframe ? { url: iframe.getAttribute('src') } : {};
  }
}

YouTubeBlot.blotName = 'youtube';
YouTubeBlot.tagName = 'p';
Quill.register(YouTubeBlot);

const quill = new Quill('#editor', {
    modules: {
    toolbar: [
        [{align:[]}, {header: [2, 3, false]}],
        [{'color': []}, 'bold', 'italic', 'underline', 'strike'],
        ['link', 'blockquote', 'code-block', 'image', 'youtube'],
        [{ list: 'ordered' }, { list: 'bullet' }],
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

function ol2ul(html){
    return html.replace(/<ol>(<li data-list="bullet".*?)<\/ol>/g, '<ul>$1</ul>')
               .replace(/<li data-list="bullet"(.*?)>/g, '<li$1>'); // Preserve attributes like class
}
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
    editorInput.value = ol2ul(editorHtml);
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