document.addEventListener('DOMContentLoaded', function() {

    // When the user clicks on the button, scroll to the top of the document
    document.getElementById('b2t').addEventListener('click', function() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });

    // Sort articles
    const sortType = document.getElementById("sortType");
    const sortOrder = document.getElementById("sortOrder");

    // Create an array to hold multiple data objects
    let dataArray = [];

    // Use document.querySelectorAll to select all elements with the specified class
    let titles = document.querySelectorAll('.a-title');
    let dates = document.querySelectorAll('.a-date');
    let mains = document.querySelectorAll('.a-main');

    for (let i = 0; i < titles.length; i++) {
        let data = {
            title: titles[i].textContent,
            date: dates[i].textContent,
            main: mains[i].textContent,
        };
        dataArray.push(data);
    }
    var articleContainer = document.getElementById('article-table');
    var selectElement = document.getElementById('sortType');
    selectElement.addEventListener('change', function() {
        var value = this.value;
        if (value) {
            let sortedData = dataArray.sort((x, y) => {
                // Assuming they are strings, compare them in a case-insensitive manner
                return y[value].localeCompare(x[value], undefined, {sensitivity: 'base'});
                });
            updateDisplay(sortedData);
        }
        else {
            updateDisplay(dataArray);
        }
        
    });
    function updateDisplay(data) {
        articleContainer.innerHTML = '';  // Clear existing content
        data.forEach(article => {
            let articleDiv = document.createElement('div');
            articleDiv.className = 'article-container';
    
            let titleSpan = document.createElement('span');
            titleSpan.className = 'a-title';
            let link = document.createElement('a');
            link.href = '1.php';  // Update href if needed
            link.textContent = article.title;
            titleSpan.appendChild(link);
    
            let dateSpan = document.createElement('span');
            dateSpan.className = 'a-date';
            dateSpan.textContent = article.date;
    
            let mainDiv = document.createElement('div');
            mainDiv.className = 'a-main';
            let paragraph = document.createElement('p');
            paragraph.textContent = article.main;
            mainDiv.appendChild(paragraph);
    
            // Append to articleDiv
            articleDiv.appendChild(titleSpan);
            articleDiv.appendChild(document.createTextNode(' / '));
            articleDiv.appendChild(dateSpan);
            articleDiv.appendChild(document.createElement('br'));
            articleDiv.appendChild(mainDiv);
    
            // Append a horizontal rule for separation
            articleContainer.appendChild(articleDiv);
            articleContainer.appendChild(document.createElement('hr'));
        });
    }
});