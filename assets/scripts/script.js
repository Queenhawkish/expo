let burger = document.querySelector('.burger_icon');
let btest = false;
if (burger) {

    burger.addEventListener('click', function () {
        if (btest == false) {
            let list = document.querySelector('.burger');
            list.style.display = "flex";
            list.style.flexDirection = "column";
            document.querySelector('nav').style.flexDirection = "column";
            btest = true;

        } else {
            let list = document.querySelector('.burger');
            list.style.display = "none";
            list.style.flexDirection = "row";
            document.querySelector('nav').style.flexDirection = "row";
            btest = false;
        }
    })

    window.onresize = function () {
        if (window.innerWidth < 750) {
            window.addEventListener('scroll', function () {

                if (window.scrollY > 950) {
                    document.querySelector('nav').style.position = "fixed";
                    document.querySelector('nav').style.top = "0";
                    document.querySelector('nav').style.margin = "1rem auto";
                } else {
                    document.querySelector('nav').style.position = "relative";
                    document.querySelector('nav').style.top = "0";
                    document.querySelector('nav').style.margin = "1rem auto";
                }
            })
        } else {
            window.addEventListener('scroll', function () {

                if (window.scrollY > 150) {
                    document.querySelector('nav').style.position = "fixed";
                    document.querySelector('nav').style.top = "0";
                    document.querySelector('nav').style.margin = "1rem auto";
                } else {
                    document.querySelector('nav').style.position = "relative";
                    document.querySelector('nav').style.top = "0";
                    document.querySelector('nav').style.margin = "1rem auto";
                }
            })
        }
    }
}