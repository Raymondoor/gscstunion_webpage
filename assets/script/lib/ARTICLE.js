function copyToClipboard(button) {
    var url = location.href;
    navigator.clipboard.writeText(url)
        .then(() => {
            console.log('URL copied to clipboard');
            button.textContent = 'コピーしました！';
        })
        .catch(err => {
            console.error('Could not copy text: ', err);
        });
}