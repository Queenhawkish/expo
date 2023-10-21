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


    if (window.scrollY > 400) {
        document.querySelector('nav').style.position = "fixed";
        document.querySelector('nav').style.top = "0";
        document.querySelector('nav').style.margin = "auto";
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
    let nodisplaypastevent = false;
    let display_past_event = document.querySelector('#display_past_event');

    thisevent.addEventListener('click', () => {
        if (display_past_event.style.display == "flex") {
            display_past_event.style.display = "none";
            display_event.style.display = "flex";
            nodisplayevent = true;
            nodisplaypastevent = false;
        } else if (nodisplayevent == true) {
            display_event.style.display = "none";
            nodisplayevent = false;
        }
        else {
            display_event.style.display = "flex";
            nodisplayevent = true;
        }
    })




    let pastevent = document.querySelector('#past_event');

    pastevent.addEventListener('click', () => {
        if (display_event.style.display == "flex") {
            display_event.style.display = "none";
            display_past_event.style.display = "flex";
            nodisplaypastevent = true;
            nodisplayevent = false;
        } else if (nodisplaypastevent == true) {
            display_past_event.style.display = "none";
            nodisplaypastevent = false;
        } else {
            display_past_event.style.display = "flex";
            nodisplaypastevent = true;
        }
    })

    let part = document.querySelector('#part');
    let unpart = document.querySelector('#unpart');

    part.addEventListener('click', () => {
        unpart.style.display = "none";
        let wishpart = document.querySelector('.wishpart');
        wishpart.style.display = "flex";
        let numbpart = document.querySelector('#numbpart');

        numbpart.addEventListener('input', () => {
            let numb = numbpart.value;
            let part_infos = document.querySelector('#part_infos');
            for (let test = 0; test < numb; test++) {
                part_infos.innerHTML += `
            <div class="participant">
                <p>Participant ${test + 1}</p>
                <input class="part_info" type="text" name="name" placeholder="Nom">
                <input class="part_info" type="text" name="firstname" placeholder="Prénom">
                <input class="part_info" type="text" name="email" placeholder="Adresse email">
            </div>
            `
            }
            let validate = document.querySelector('.nbpartvalidate');
            validate.addEventListener('click', () => {
                part_infos.style.display = "flex";
                let register = document.querySelector('.register');
                register.style.display = "flex";
                wishpart.style.display = "none";
                part.style.display = "none";
                let cancel = document.querySelector('.cancel');
                cancel.addEventListener('click', () => {
                    part_infos.style.display = "none";
                    part.style.display = "flex";
                    register.style.display = "none";
                    unpart.style.display = "flex";
                })
            })
        })


    })
}


let info = document.querySelector('.infos');
let noinfo = false;

info.addEventListener('click', () => {
    if (noinfo == false) {
        let info_display = document.querySelector('.info_display');
        info_display.style.display = "flex";
        noinfo = true;
    } else {
        let info_display = document.querySelector('.info_display');
        info_display.style.display = "none";
        noinfo = false;
    }
})