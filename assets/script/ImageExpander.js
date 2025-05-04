export class ImageExpander {
    constructor() {
        this.images = document.querySelectorAll('img');
        this.init();
    }

    init() {
        // Bind click events to all images
        this.images.forEach((img) => {
            img.addEventListener('click', () => this.expand(img));
        });
    }

    expand(img) {
        // Get image URL from src attribute
        const imageUrl = img.src;

        // Create overlay
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100vw';
        overlay.style.height = '100dvh';
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
        overlay.addEventListener('click', () => {
            overlay.remove();
        });

        // Prevent closing when clicking the image
        expandedImage.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }
}