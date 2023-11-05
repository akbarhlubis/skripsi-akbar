const darkToggle = document.querySelector("#dark-toggle");
const html = document.querySelector("html");

window.onscroll = function () {
    const header = document.querySelector(".head-part");
    const fab = document.querySelector(".fab");
    const fixedNav = header.offsetTop;

    if (window.scrollY > fixedNav) {
        header.classList.add("backdrop-blur-md","shadow-sm");
        fab.classList.remove("invisible");
        header.style.transition = "all 0.2s ease";
        fab.style.transition = "all 0.2s ease";
    }
    else{
        fab.classList.add("invisible");
        header.classList.remove("backdrop-blur-md","shadow-sm");
        header.style.transition = "all 0.2s ease";
        fab.style.transition = "all 0.2s ease";
    }
}

darkToggle.addEventListener("click", () => {
    if (darkToggle.checked) {
        html.classList.add("dark");
        localStorage.theme = "dark";
    } else {
        html.classList.remove("dark");
        localStorage.theme = "light";
    }
});

// Pindah posisi toggle sesuai dengan mode yang disimpan di local storage
if (
    localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
    darkToggle.checked = true;
} else {
    document.documentElement.classList.remove("dark");
    darkToggle.checked = false;
}
