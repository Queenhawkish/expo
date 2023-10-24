let home = document.querySelector('#home');
let about = document.querySelector('#about');
let events = document.querySelector('#calendar');
let gallery = document.querySelector('#gallery');
let homepage = document.querySelector('.home');
let aboutpage = document.querySelector('.about');
let eventspage = document.querySelector('.calendar');
let gallerypage = document.querySelector('.gallerypage');

if (homepage) {
    home.style.color = "white";
    home.style.backgroundColor = "black";
}

if (aboutpage) {
    about.style.color = "white";
    about.style.backgroundColor = "black";
}

if (eventspage) {
    events.style.color = "white";
    events.style.backgroundColor = "black";
}

if (gallerypage) {
    gallery.style.color = "white";
    gallery.style.backgroundColor = "black";
}





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


}
window.addEventListener('scroll', function () {


    if (window.scrollY > 850) {
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



    let part = document.querySelector('#part');
    let unpart = document.querySelector('#unpart');

    part.addEventListener('click', () => {
        let participation = document.querySelector('.participation');
        participation.style.display = "flex";
        part.style.display = "none";
        unpart.style.display = "none";
        let infos_event = document.querySelector('.infos_event');
        infos_event.style.display = "none";
        let wishpart = document.querySelector('.wishpart');
        wishpart.style.display = "flex";
        let numbpart = document.querySelector('#numbpart');

        numbpart.addEventListener('input', () => {
            let part_infos = document.querySelector('#part_infos');
            part_infos.innerHTML = "";
            let numb = numbpart.value;
            for (let people = 0; people < numb; people++) {
                part_infos.innerHTML += `
            <div class="participant">
                <p>Participant ${people + 1}</p>
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
                    infos_event.style.display = "flex";
                    register.style.display = "none";
                    unpart.style.display = "flex";
                })
            })
        })


    })


    unpart.addEventListener('click', () => {
        unpart.style.display = "none";
        part.style.display = "none";
        partnumb.innerHTML = `
        Nombre de personne souhaitant se désinscrire :
        `
        let wishpart = document.querySelector('.wishpart');
        wishpart.style.display = "flex";
        let numbpart = document.querySelector('#numbpart');
        numbpart.addEventListener('input', () => {
            let numb = numbpart.value;
            let part_infos = document.querySelector('#part_infos');
            for (let people = 0; people < numb; people++) {
                part_infos.innerHTML += `
                <div class="participant">
                    <p>Participant ${people + 1}</p>
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
                unpart.style.display = "none";
                let cancel = document.querySelector('.cancel');
                cancel.addEventListener('click', () => {
                    part_infos.style.display = "none";
                    unpart.style.display = "flex";
                    infos_event.style.display = "flex";
                    register.style.display = "none";
                    part.style.display = "flex";
                })
            })
        })
    })
}

let event_details = document.querySelector('.event_details');

if (event_details) {

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
}