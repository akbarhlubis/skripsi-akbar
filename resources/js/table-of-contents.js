// decalre variables
var toc = document.querySelector('#toc');
var headlines = Array.from(document.querySelectorAll('h2,h3'));

// loop through headlines and add id to each
headlines.forEach((item, index) => {
    var id = item.textContent.toLowerCase().split(" ").join("-")
    console.log(id);
    console.log(item.tagName);
    item.setAttribute("id", item.textContent);
    toc.innerHTML += `<li><a class="hover:text-gray-400 list-outside" href="#${item.textContent}"> ${item.textContent}</a></li>`;
    // add class pl-4 to each li for item.tagName == "H3"
    if (item.tagName == "H3") {
        var li = document.querySelector(`#toc li:nth-child(${index + 1})`);
        li.classList.add("pl-4","text-xs");
    }
})
