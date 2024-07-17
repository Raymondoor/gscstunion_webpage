document.addEventListener('DOMContentLoaded', function() {
    let list = document.getElementById('article-list');
    let items = Array.from(list.querySelectorAll('li')); // Convert NodeList to Array
    items.sort(function(a, b) {
        return new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date'));
    });
    items.forEach(function(item) {
        list.appendChild(item); // Re-append items in sorted order
        list.appendChild(document.createElement('hr')); // Append a horizontal line after each item
    });
});