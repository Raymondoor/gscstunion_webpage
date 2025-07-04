class YoutubeBlot extends BlockEmbed{
    static blotName = 'yt';
    static tagName = 'div';
    static className = 'ql-custom-yt'
    static create(value){
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
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        node.appendChild(iframe);
        node.style.width = "clamp(280px, 75vw, 860px)";
        node.style.height = "calc(clamp(280px, 75vw, 860px) * 0.5625)";
        node.style.margin = "0.5rem auto";
        return node;
    }
    static convertToEmbedUrl(url){
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        if(match && match[2].length === 11){
            return `https://www.youtube.com/embed/${match[2]}`;
        }
        return null;
    }
    static logic(){
        console.log(this); // Should be YoutubeBlot
        console.log(typeof this.convertToEmbedUrl);
        const url = prompt('YouTubeのリンクを入力してください。');
        if(url){
            const embedUrl = this.convertToEmbedUrl(url);
            if(embedUrl){
                const range = quill.getSelection(true); // Get current cursor position
                quill.insertEmbed(range.index, 'yt', { url: embedUrl }, Quill.sources.USER);
            }else{
                alert('対応していない形式です！（YouTubeのリンクのみ）');
            }
        }
    }
    static button(){
        const svgString = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 180" width="18" height="18"><path class="ql-fill" d="M220,2H40C19.01,2,2,19.01,2,40v100c0,20.99,17.01,38,38,38h180c20.99,0,38-17.01,38-38V40C258,19.01,240.99,2,220,2z M102,130V50l68,40L102,130z"/></svg>`;

        // Convert the string to a DOM element
        const template = document.createElement('template');
        template.innerHTML = svgString.trim(); // trim() is important to avoid text nodes
        const svgElement = template.content.firstChild;

        // Append it to the .ql-hr element
        const target = document.querySelector('.ql-yt');
        target.innerHTML = '';
        if(target){
            target.appendChild(svgElement);
        }
    }
}