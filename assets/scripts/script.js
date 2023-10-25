let home = document.querySelector('#home');
let about = document.querySelector('#about');
let events = document.querySelector('#calendar');
let gallery = document.querySelector('#gallery');
let connection = document.querySelector('#connection');
let homepage = document.querySelector('.home');
let aboutpage = document.querySelector('.about');
let eventspage = document.querySelector('.calendar');
let gallerypage = document.querySelector('.gallerypage');
let connectionpage = document.querySelector('.visitor');

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

if (connectionpage) {
    connection.style.color = "white";
    connection.style.backgroundColor = "black";
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


    if (window.scrollY > 1000) {
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

let form_old_event = document.querySelector('.form_old_event');

if (form_old_event) {
    let event_nb_pic = document.querySelector('.event_nb_pic');
    event_nb_pic.addEventListener('input', () => {
        let add_pictures = document.querySelector('.add_pictures');
        let pictures = document.querySelector('.pictures');
        add_pictures.innerHTML = "";
        for (let pic = 0; pic < event_nb_pic.value; pic++) {
            add_pictures.innerHTML += `
            <div class="add_picture">
                <p>Photo ${pic + 1}</p>
                <input class="pic_input" type="file" name="pic${pic + 1}" accept="image/png, image/jpeg">
            </div>
            `
        }
        pictures.style.display = "flex";
    })
}

let signup = document.querySelector('.signup');

if (signup) {

    let password = document.querySelector('.password');
    password.addEventListener('input', () => {

        let eye = document.querySelector('.eye');
        eye.style.display = "block";

        eye.addEventListener('click', () => {
            eye.style.display = "none";
            let eye_slash = document.querySelector('.eye-slash');
            eye_slash.style.display = "block";
            password.type = "text";
            eye_slash.addEventListener('click', () => {
                eye_slash.style.display = "none";
                eye.style.display = "block";
                password.type = "password";
            })

        })


        let password_strength = document.querySelector('.password_strength');
        password_strength.style.display = "flex";
        let tolow = document.querySelector('.tolow');
        let low = document.querySelector('.low');
        let correct = document.querySelector('.correct');
        let strong = document.querySelector('.strong');

        let first_check = new RegExp(/^((?=.*[a-z])(?=.*[A-Z])).{4,}$|^((?=.*[a-z])(?=.*[0-9])).{4,}$|^(?=.*[a-z])(?=.*[!@#$%^&*]).{4,}$|^(?=.*[A-Z])(?=.*[0-9]).{4,}$|^(?=.*[A-Z])(?=.*[!@#$%^&*]).{4,}$|^(?=.*[0-9])(?=.*[!@#$%^&*]).{4,}$/);

        let second_check = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$|^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$|^(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$|^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$/);

        let last_check = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/);

        let psw = document.querySelector('.psw');

        if (password.value.length == 0) {
            eye.style.display = "none";
            password_strength.style.display = "none";
            tolow.style.display = "none";
            low.style.display = "none";
            correct.style.display = "none";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
        } else if (password.value.length <= 3) {
            tolow.style.display = "block";
            low.style.display = "none";
            correct.style.display = "none";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
        } else if (first_check.test(password.value)) {
            tolow.style.display = "block";
            low.style.display = "block";
            correct.style.display = "none";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
        }
        if (second_check.test(password.value)) {
            tolow.style.display = "block";
            low.style.display = "block";
            correct.style.display = "block";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
        }
        if (last_check.test(password.value)) {
            tolow.style.display = "block";
            low.style.display = "block";
            correct.style.display = "block";
            strong.style.display = "block";
            password.style.backgroundColor = "transparent";
            psw.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
        }
    })


    let passwordc = document.querySelector('.passwordc');

    passwordc.addEventListener('input', () => {


        let eye2 = document.querySelector('.eyec');
        eye2.style.display = "block";

        eye2.addEventListener('click', () => {
            eye2.style.display = "none";
            let eye_slash2 = document.querySelector('.eye-slashc');
            eye_slash2.style.display = "block";
            let passwordc = document.querySelector('.passwordc');
            passwordc.type = "text";
            eye_slash2.addEventListener('click', () => {
                eye_slash2.style.display = "none";
                eye2.style.display = "block";
                passwordc.type = "password";
            })
        })
        let psw = document.querySelector('.pswc');

        if (passwordc.value.length == 0) {
            eye2.style.display = "none";
            psw.style.backgroundColor = "white";
        } else if (passwordc.value == password.value) {
            passwordc.style.backgroundColor = "transparent";
            psw.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
        }
        else {
            passwordc.style.backgroundColor = "transparent";
            psw.style.backgroundColor = "rgba(255, 0, 0, 0.5)";
        }



    })
}