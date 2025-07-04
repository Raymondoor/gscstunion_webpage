class ImageExpander {
    constructor() {
        this.images = document.querySelectorAll('img');
        this.init();
    }

    init() {
        // Bind click events to all images
        this.images.forEach((img) => {
            img.addEventListener('click', () => this.expand(img));
            img.style.cursor = 'pointer';
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
        overlay.style.opacity = '0'; // Start with invisible overlay
        overlay.style.transition = 'opacity 360ms'; // Transition for fade

        // Create expanded image
        const expandedImage = document.createElement('img');
        expandedImage.src = imageUrl;
        expandedImage.style.maxWidth = '90%';
        expandedImage.style.maxHeight = '90%';
        expandedImage.style.objectFit = 'contain';
        expandedImage.style.cursor = 'default';
        expandedImage.style.opacity = '0'; // Start with invisible image
        expandedImage.style.transition = 'opacity 360ms'; // Transition for fade

        overlay.appendChild(expandedImage);
        document.body.appendChild(overlay);

        // Trigger fade-in animation after appending
        requestAnimationFrame(() => {
            overlay.style.opacity = '1';
            expandedImage.style.opacity = '1';
        });

        // Close on overlay click
        overlay.addEventListener('click', () => {
            // Start fade-out animation
            overlay.style.opacity = '0';
            expandedImage.style.opacity = '0';

            // Remove overlay after animation completes
            setTimeout(() => {
                overlay.remove();
            }, 360); // Match the transition duration (360ms)
        });

        // Prevent closing when clicking the image
        expandedImage.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }
}