// decalre variables
var toc = document.querySelector('#toc');
var headlines = Array.from(document.querySelectorAll('h2,h3'));

// loop through headlines and add id to each
headlines.forEach((item, index) => {
    var id = item.textContent.toLowerCase().split(" ").join("-")
    console.log(id);
    console.log(item.tagName);
    item.setAttribute("id", item.textContent);
    toc.innerHTML += `<li><a class="hover:text-gray-400" href="#${item.textContent}">${index+1}. ${item.textContent}</a></li>`;
    console.log(item.textContent);
})
