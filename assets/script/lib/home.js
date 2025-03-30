function descriptionDropdown(){
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fallIn');
            console.log('fallIn executed');
            // stop observing after animation added
            observer.unobserve(entry.target);
        }
        });
    }, {
        threshold: 0.5 // Trigger when x/10 of the element is in view
    });
    const description = document.getElementById('au-description');
    observer.observe(description);
}
function articlesViewIn(){
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            anime({
                targets: '.article',
                opacity: [0, 1],
                duration: 1200,
                //delay: anime.stagger(120),
                easing: 'easeInQuad'
            });
        }
        });
    }, {
        threshold: 0.1 // Trigger when x/10 of the element is in view
    });
    const description = document.getElementById('articlesContainer');
    observer.observe(description);
}
document.addEventListener('DOMContentLoaded', function(){
    descriptionDropdown();
    articlesViewIn();
});
anime({
    targets: '#home-banner',
    opacity: [0, 1],
    duration: 1800,
    delay: 480,
    easing: 'linear'
});
