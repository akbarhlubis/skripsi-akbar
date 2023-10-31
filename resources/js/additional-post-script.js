const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.addEventListener("keyup", function() {
    let preslug = name.value;
    preslug = preslug.replace(/ /g, "-");
    slug.value = preslug.toLowerCase();
});

Trix.config.blockAttributes.heading2 = {
    tagName: 'h2',
    terminal: true,
    breakOnReturn: true,
    group: false
}

addEventListener("trix-initialize", event => {
    const {
        toolbarElement
    } = event.target
    const h1Button = toolbarElement.querySelector("[data-trix-attribute=heading1]")
    h1Button.insertAdjacentHTML("afterend", `
<button type="button" class="trix-button" data-trix-attribute="heading2" title="Heading 2" tabindex="-1" data-trix-active="">H2</button>
`)
})