class HrBlot extends BlockEmbed{
    static blotName = 'hr';
    static tagName = 'div';
    static className = 'ql-custom-hr'
    static create(value){
        // you added value, ↑ but what is it for?
        const node = super.create();
        const hr = document.createElement('hr');
        hr.setAttribute('contenteditable', 'false');
        node.appendChild(hr);
        
        return node;
    }
    static logic(){
        const range = quill.getSelection();
        if(range){
            // Insert a newline before HR if not at beginning of a line
            if(range.index > 0){
                quill.insertText(range.index, '\n', Quill.sources.SILENT);
            }
            // Insert the HR blot
            quill.insertEmbed(range.index + 1, 'hr', true, Quill.sources.USER);
            // Insert a newline after HR to separate it from the next paragraph
            quill.insertText(range.index + 2, '\n', Quill.sources.SILENT);
            // Move the cursor to the line after the HR
            quill.setSelection(range.index + 2, Quill.sources.SILENT);
            const elements = document.querySelectorAll('.ql-custom-hr');
            elements.forEach(el => {
                el.style.padding = '0.5rem 0';
            });
        }
    }
    static button(){
        const svgString = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><line class="ql-stroke" x1="3" y1="9" x2="15" y2="9" stroke="#202020" stroke-width="2" stroke-linecap="round" /></svg>`;

        // Convert the string to a DOM element
        const template = document.createElement('template');
        template.innerHTML = svgString.trim(); // trim() is important to avoid text nodes
        const svgElement = template.content.firstChild;

        // Append it to the .ql-hr element
        const target = document.querySelector('.ql-hr');
        target.innerHTML = '';
        if(target){
            target.appendChild(svgElement);
        }
    }
}