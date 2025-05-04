class Phgl{
    constructor(){
        this.elements = document.querySelectorAll('.phgl[phgl-image]');
        this.init();
    }

    init(){
        // Set background images and bind click events
        this.elements.forEach((element) =>{
            const imageUrl = element.getAttribute('phgl-image');
            element.style.backgroundImage = `url(${imageUrl})`;
            element.addEventListener('click', () => this.expand(element));
        });
    }

    expand(element){
        // Get image URL from phgl-image attribute
        const imageUrl = element.getAttribute('phgl-image');

        // Create overlay
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100vw';
        overlay.style.height = '100vh';
        overlay.style.background = 'rgba(0,0,0,0.8)';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = '1000';

        // Create expanded image
        const expandedImage = document.createElement('img');
        expandedImage.src = imageUrl;
        expandedImage.style.maxWidth = '90%';
        expandedImage.style.maxHeight = '90%';
        expandedImage.style.objectFit = 'contain';

        overlay.appendChild(expandedImage);
        document.body.appendChild(overlay);

        // Close on overlay click
        overlay.addEventListener('click', () =>{
            overlay.remove();
        });

        // Prevent closing when clicking the image
        expandedImage.addEventListener('click', (e) =>{
            e.stopPropagation();
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () =>{
    new Phgl();
});