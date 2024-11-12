const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
    if (entry.isIntersecting) {
        entry.target.classList.add('start-animation');
        console.log('fallIn executed');
        // stop observing after animation added
        observer.unobserve(entry.target);
    }
    });
}, {
    threshold: 0.3 // Trigger when 50% of the element is in view
});

const textElement = document.getElementById('hdescription');
observer.observe(textElement);
