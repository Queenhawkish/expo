let home = document.querySelector('#home');
let about = document.querySelector('#about');
let events = document.querySelector('#calendar');
let gallery = document.querySelector('#gallery');
let connection = document.querySelector('#connection');
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
    let participant = document.querySelector('.participant');
    part.addEventListener('click', () => {
        participant.style.display = "flex";
        part.style.display = "none";
    })
    let cancelpart = document.querySelector('.cancelpart');
    cancelpart.addEventListener('click', () => {
        participant.style.display = "none";
        part.style.display = "flex";
    })

}

let form_add_event = document.querySelector('.form_add_event');

if (form_add_event) {
    let event_type = document.querySelector('#event_type');
    let sortie = document.querySelector('.sortie');
    let other_type = document.querySelector('.other_type');
    let date_event = document.querySelector('.date_event');
    let picture_event = document.querySelector('.picture_event');
    let event_poster = document.querySelector('.event_poster');
    event_type.addEventListener('change', () => {
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
    if (event_type.value == 2 || event_type.value == 3) {
        picture_event.style.display = "none";
        date_event.style.display = "flex";
        sortie.style.display = "flex";
        other_type.style.display = "none";
        event_poster.style.display = "none";
    }
    if (event_type.value == 1) {
        sortie.style.display = "none";
        date_event.style.display = "flex";
        other_type.style.display = "flex";
        picture_event.style.display = "flex";
        event_poster.style.display = "flex";
    }
    if (event_type.value == 0) {
        picture_event.style.display = "flex";
        sortie.style.display = "none";
        other_type.style.display = "none";
        date_event.style.display = "none";
        event_poster.style.display = "none";
    }
}

let add_photos = document.querySelector('.add_photos');

if (add_photos) {
    console.log(image.src);
    input_image.onchange = evt => {
        const [file] = input_image.files
        if (file) {
            image.src = URL.createObjectURL(file)
            image.style.display = "block";
            let add_picture = document.querySelector('.add_picture');
            add_picture.innerHTML += `
            <input id="input_image" class="pic_input" type="file" name="pic" accept="image/png, image/jpeg">
            `
            if (image.src == "") {
                image.style.display = "none";
            }
            let show_images = document.querySelector('.show_images');
            show_images.innerHTML += `
            <img id="image" class="show_image" alt="Photo">
            `
        }
    }
}
