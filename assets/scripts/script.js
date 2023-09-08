window.addEventListener('scroll', function () {
    if (window.scrollY > 350) {
        document.querySelector('nav').style.position = "fixed";
        document.querySelector('nav').style.top = "0";
        document.querySelector('nav').style.margin = "auto";

    } else {
        document.querySelector('nav').style.position = "relative";
        document.querySelector('nav').style.top = "auto";
        document.querySelector('nav').style.margin = "1rem auto";
    }
})

let burger = document.querySelector('.burger_icon');
if (burger) {
    burger.addEventListener('click', function () {
        let list = document.querySelector('.burger');
        list.style.display = "block";

    })
}