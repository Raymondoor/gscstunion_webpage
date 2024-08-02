// Sort articles

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
var sortDirElement = document.getElementById('sortOrder');
function sortAndUpdateDisplay() {
    var sortProperty = selectElement.value;
    var sortDirection = sortDirElement.value;
    if (sortProperty) {
        let sortedData = dataArray.sort((x, y) => {
            const modifier = sortDirection === 'ASC' ? -1 : 1;
            if (sortProperty === "title"){
                return  modifier * y[sortProperty].localeCompare(x[sortProperty], 'ja-JP', {sensitivity: 'variant'});
            }
            else {
                return modifier * y[sortProperty].localeCompare(x[sortProperty], undefined, {sensitivity: 'base'});
            }
        });
        updateDisplay(sortedData);
    }
    else {
        updateDisplay(dataArray);
    }
    
};
selectElement.addEventListener('change', sortAndUpdateDisplay);
sortDirElement.addEventListener('change', sortAndUpdateDisplay);

export function updateDisplay(data) {
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
    console.log('Sort algorythm executed')
}