import { updateDisplay } from "./lib/sort-article.js";

document.addEventListener('DOMContentLoaded', function() {

    // When the user clicks on the button, scroll to the top of the document
    document.getElementById('b2t').addEventListener('click', function() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        console.log('go to top')
    });
    
});