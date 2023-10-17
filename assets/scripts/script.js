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


    if (screen.width < 750) {
        window.addEventListener('scroll', function () {

            if (window.scrollY > 100) {
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
window.addEventListener('scroll', function () {


    if (window.scrollY > 300) {
        document.querySelector('nav').style.position = "fixed";
        document.querySelector('nav').style.top = "0";
        document.querySelector('nav').style.margin = "1rem auto";
    } else {
        document.querySelector('nav').style.position = "relative";
        document.querySelector('nav').style.top = "0";
        document.querySelector('nav').style.margin = "1rem auto";
    }
})

let calendar = document.querySelector('.calendar');

if (calendar) {

    let thisevent = document.querySelector('.today');
    let display_event = document.querySelector('#display_event');
    let nodisplayevent = false;
    let display_past_event = document.querySelector('#display_past_event');

    thisevent.addEventListener('click', () => {
        if (display_past_event.style.display == "flex") {
            display_past_event.style.display = "none";
            display_event.style.display = "flex";
            nodisplayevent = true;
        } else if (nodisplayevent == true) {
            display_event.style.display = "none";
            nodisplayevent = false;
        } else {
            display_event.style.display = "flex";
            nodisplayevent = true;
        }
    })

    let pastevent = document.querySelector('#past_event');
    let nodisplaypastevent = false;

    pastevent.addEventListener('click', () => {
        if (display_event.style.display == "flex") {
            display_event.style.display = "none";
            display_past_event.style.display = "flex";
            nodisplaypastevent = true;
        } else if (nodisplaypastevent == true) {
            display_past_event.style.display = "none";
            nodisplaypastevent = false;
        } else {
            display_past_event.style.display = "flex";
            nodisplaypastevent = true;
        }
    })
}
