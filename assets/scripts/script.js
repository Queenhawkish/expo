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
let form_old_event = document.querySelector('.form_old_event');
let form_new_event = document.querySelector('.form_new_event');

if (homepage) {
    home.style.color = "white";
    home.style.backgroundColor = "black";
}

if (aboutpage) {
    about.style.color = "white";
    about.style.backgroundColor = "black";
}

if (eventspage || form_new_event) {
    events.style.color = "white";
    events.style.backgroundColor = "black";
}

if (gallerypage || form_old_event) {
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

let profil = document.querySelector('.profil');

if (profil) {
    let modify_lastname = document.querySelector('#modify_lastname');
    let modify_firstname = document.querySelector('#modify_firstname');
    let modify_email = document.querySelector('#modify_email');
    let modify_pwd = document.querySelector('#modify_pwd');
    let signup_item = document.querySelector('.signup_item');
    signup_item.style.display = "none";

    modify_lastname.addEventListener('click', () => {
        let actual_lastname = document.querySelector('.actual_lastname');
        let old_lastname = actual_lastname.innerHTML;
        modify_lastname.style.display = "none";
        let lastname = document.querySelector('.lastname');
        lastname.style.justifyContent = "center";
        actual_lastname.style.display = "flex";
        actual_lastname.style.flexDirection = "column";
        actual_lastname.style.justifyContent = "center";
        actual_lastname.innerHTML = `
            <label for="user_lastname" class="modify_user_info">Veuillez saisir votre nom</label>
            <div class="modify_user_info">
                <input type="text" name="user_lastname" class="input_user_info" placeholder="Doe">
            </div>
            <div class="modify_user_info_button">
                <button class="profilbut cancelbutl">Annuler</button>
                <button class="profilbut validbut">Valider</button>
            </div>
        `
        let cancelbut = document.querySelector('.cancelbutl');
        cancelbut.addEventListener('click', () => {
            actual_lastname.innerHTML = old_lastname;
            modify_lastname.style.display = "flex";
            actual_lastname.style.flexDirection = "row";
            lastname.style.justifyContent = "space-between";
        })

    })

    modify_firstname.addEventListener('click', () => {
        let actual_firstname = document.querySelector('.actual_firstname');
        let old_firstname = actual_firstname.innerHTML;
        modify_firstname.style.display = "none";
        let firstname = document.querySelector('.firstname');
        firstname.style.justifyContent = "center";
        actual_firstname.style.display = "flex";
        actual_firstname.style.flexDirection = "column";
        actual_firstname.style.justifyContent = "center";
        actual_firstname.innerHTML = `
            <label for="user_firstname" class="modify_user_info">Veuillez saisir votre prénom</label>
            <div class="modify_user_info">
                <input type="text" name="user_firstname" class="input_user_info" placeholder="John">
            </div>
            <div class="modify_user_info_button">
                <button class="profilbut cancelbutf">Annuler</button>
                <button class="profilbut validbut">Valider</button>
            </div>
        `
        let cancelbut = document.querySelector('.cancelbutf');
        cancelbut.addEventListener('click', () => {
            actual_firstname.innerHTML = old_firstname;
            modify_firstname.style.display = "flex";
            actual_firstname.style.flexDirection = "row";
            firstname.style.justifyContent = "space-between";
        })

    })

    modify_email.addEventListener('click', () => {
        let actual_email = document.querySelector('.actual_email');
        let old_email = actual_email.innerHTML;
        modify_email.style.display = "none";
        let email = document.querySelector('.email');
        email.style.justifyContent = "center";
        actual_email.style.display = "flex";
        actual_email.style.flexDirection = "column";
        actual_email.style.justifyContent = "center";
        actual_email.innerHTML = `
            <label for="user_email" class="modify_user_info">Veuillez saisir votre adresse email</label>
            <div class="modify_user_info">
                <input type="email" name="user_email" class="input_user_info" placeholder="doe.john@email.com">
            </div>
            <div class="modify_user_info_button">
                <button class="profilbut cancelbute">Annuler</button>
                <button class="profilbut validbut">Valider</button>
            </div>
        `
        let cancelbut = document.querySelector('.cancelbute');
        cancelbut.addEventListener('click', () => {
            actual_email.innerHTML = old_email;
            modify_email.style.display = "flex";
            actual_email.style.flexDirection = "row";
            email.style.justifyContent = "space-between";
        })

    })

    modify_pwd.addEventListener('click', () => {
        let actual_pwd = document.querySelector('.actual_pwd');
        let old_pwd = actual_pwd.innerHTML;
        modify_pwd.style.display = "none";
        let pwd = document.querySelector('.pwd');
        pwd.style.justifyContent = "center";
        actual_pwd.style.display = "flex";
        actual_pwd.style.flexDirection = "column";
        actual_pwd.style.justifyContent = "center";
        actual_pwd.innerHTML = `
            <label for="user_pwd" class="modify_user_info">Veuillez saisir votre ancien mot de passe</label>
            <div class="psw">
                <input type="password" name="user_password" class="passwordo">
                <i class="bi bi-eye eyeo"></i>
                <i class="bi bi-eye-slash eye-slasho"></i>
            </div>
            <div class="signup_item">
            <label for="user_password">Veuillez saisir votre mot de passe</label>
            <div class="pswn">
                <input type="password" name="user_password" class="passwordn">
                <i class="bi bi-eye eyen"></i>
                <i class="bi bi-eye-slash eye-slashn"></i>
            </div>
            <div class="password_strengthn">
                <div class="tolown"></div>
                <div class="lown"></div>
                <div class="correctn"></div>
                <div class="strongn"></div>
            </div>
            </div>
            <div class="signup_item">
                <label for="user_password_confirm">Veuillez confirmer votre mot de passe</label>
                <div class="pswnc">
                    <input type="password" name="user_password_confirm" class="passwordnc">
                    <i class="bi bi-eye eyenc"></i>
                    <i class="bi bi-eye-slash eye-slashnc"></i>
                </div>
            </div>
            <div class="modify_user_info_button">
                <button class="profilbut cancelbutp">Annuler</button>
                <button class="profilbut validbut">Valider</button>
            </div>
        `
        let passwordo = document.querySelector('.passwordo');
        passwordo.addEventListener('input', () => {

            let eye = document.querySelector('.eyeo');
            eye.style.display = "block";

            eye.addEventListener('click', () => {
                eye.style.display = "none";
                let eye_slash = document.querySelector('.eye-slasho');
                eye_slash.style.display = "block";
                passwordo.type = "text";
                eye_slash.addEventListener('click', () => {
                    eye_slash.style.display = "none";
                    eye.style.display = "block";
                    passwordo.type = "password";
                })

            })
            if (passwordo.value.length == 0) {
                eye.style.display = "none";
                eye_slash.style.display = "none";
            }
        })

        let passwordn = document.querySelector('.passwordn');
        passwordn.addEventListener('input', () => {

            let eye = document.querySelector('.eyen');
            eye.style.display = "block";
            let password_strength = document.querySelector('.password_strengthn');
            password_strength.style.display = "flex";
            let tolow = document.querySelector('.tolown');
            let low = document.querySelector('.lown');
            let correct = document.querySelector('.correctn');
            let strong = document.querySelector('.strongn');

            let first_check = new RegExp(/^((?=.*[a-z])(?=.*[A-Z])).{4,}$|^((?=.*[a-z])(?=.*[0-9])).{4,}$|^(?=.*[a-z])(?=.*[!@#$%^&*]).{4,}$|^(?=.*[A-Z])(?=.*[0-9]).{4,}$|^(?=.*[A-Z])(?=.*[!@#$%^&*]).{4,}$|^(?=.*[0-9])(?=.*[!@#$%^&*]).{4,}$/);
    
            let second_check = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$|^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$|^(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$|^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$/);
    
            let last_check = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/);

            eye.addEventListener('click', () => {
                eye.style.display = "none";
                let eye_slash = document.querySelector('.eye-slashn');
                eye_slash.style.display = "block";
                passwordn.type = "text";
                eye_slash.addEventListener('click', () => {
                    eye_slash.style.display = "none";
                    eye.style.display = "block";
                    passwordn.type = "password";
                })

            })
            if (passwordn.value.length == 0) {
                eye.style.display = "none";
                password_strength.style.display = "none";
                tolow.style.display = "none";
                low.style.display = "none";
                correct.style.display = "none";
                strong.style.display = "none";
                psw.style.backgroundColor = "white";
            }
        })

        let passwordnc = document.querySelector('.passwordnc');
        passwordnc.addEventListener('input', () => {

            let eye = document.querySelector('.eyenc');
            eye.style.display = "block";

            eye.addEventListener('click', () => {
                eye.style.display = "none";
                let eye_slash = document.querySelector('.eye-slashnc');
                eye_slash.style.display = "block";
                passwordnc.type = "text";
                eye_slash.addEventListener('click', () => {
                    eye_slash.style.display = "none";
                    eye.style.display = "block";
                    passwordnc.type = "password";
                })

            })
        })

        let cancelbut = document.querySelector('.cancelbutp');
        cancelbut.addEventListener('click', () => {
            actual_pwd.innerHTML = old_pwd;
            modify_pwd.style.display = "flex";
            actual_pwd.style.flexDirection = "row";
            pwd.style.justifyContent = "space-between";
        })

    })
}