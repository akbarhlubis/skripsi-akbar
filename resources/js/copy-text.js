function copyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
}

window.copyToClipboard = function() {
    copyTextToClipboard(this.url);
    alert("URL copied to clipboard: " + this.url);
}