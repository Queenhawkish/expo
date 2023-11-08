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
let form_add_event = document.querySelector('.form_add_event');

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
    let part = document.querySelector('.part');
    part.addEventListener('click', () => {
        let part2 = document.querySelector('.part2');
        part2.style.display = "flex";
        part.style.display = "none";
    })
}

let event_details = document.querySelector('.event_details');

if (event_details) {
    let add_photos = document.querySelector('.add_photos');
    add_photos.style.display = "none";
    let button_event = document.querySelector('.button_event');
    if (button_event) {
        let edit_photo = document.querySelector('.edit_photo');
        edit_photo.addEventListener('click', () => {
            add_photos.style.display = "block";
            let event_nb_pic = document.querySelector('.event_nb_pic');
            event_nb_pic.addEventListener('input', () => {
                let add_pictures = document.querySelector('.add_pictures');
                let pictures = document.querySelector('.pictures');
                let add = document.querySelector('.add');
                add.style.display = "flex";
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
                if (event_nb_pic.value == 0) {
                    add.style.display = "none";
                }
            })
        })
    }
}


if (form_add_event) {
    let event_type = document.querySelector('#event_type');
    event_type.addEventListener('change', () => {
        let sortie = document.querySelector('.sortie');
        let other_type = document.querySelector('.other_type');
        let date_event = document.querySelector('.date_event');
        let picture_event = document.querySelector('.picture_event');
        let event_poster = document.querySelector('.event_poster');
        if (event_type.value == 2 || event_type.value == 3) {
            picture_event.style.display = "none";
            date_event.style.display = "flex";
            sortie.style.display = "flex";
            other_type.style.display = "none";
            event_poster.style.display = "none";
        } else if (event_type.value == 1) {
            sortie.style.display = "none";
            date_event.style.display = "flex";
            other_type.style.display = "flex";
            picture_event.style.display = "flex";
            event_poster.style.display = "flex";
        } else {
            picture_event.style.display = "flex";
            sortie.style.display = "none";
            other_type.style.display = "none";
            date_event.style.display = "none";
            event_poster.style.display = "none";
        }
    })
}

let add_photos = document.querySelector('.add_photos');

if (add_photos) {
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
