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

    thisevent.addEventListener('click', () => {
        if (nodisplayevent == true) {
            display_event.style.display = "none";
            nodisplayevent = false;
        }
        else {
            display_event.style.display = "flex";
            nodisplayevent = true;
        }
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
        let requierements = document.querySelector('.requierements');

        if (password.value.length == 0) {
            eye.style.display = "none";
            password_strength.style.display = "none";
            tolow.style.display = "none";
            low.style.display = "none";
            correct.style.display = "none";
            strong.style.display = "none";
            requierements.style.display = "none";
            psw.style.backgroundColor = "white";
        } else if (password.value.length <= 3) {
            tolow.style.display = "block";
            low.style.display = "none";
            correct.style.display = "none";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
            requierements.style.display = "flex";
        } else if (first_check.test(password.value)) {
            tolow.style.display = "block";
            low.style.display = "block";
            correct.style.display = "none";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
            requierements.style.display = "flex";
        }
        if (second_check.test(password.value)) {
            tolow.style.display = "block";
            low.style.display = "block";
            correct.style.display = "block";
            strong.style.display = "none";
            psw.style.backgroundColor = "white";
            requierements.style.display = "flex";
        }
        if (last_check.test(password.value)) {
            tolow.style.display = "block";
            low.style.display = "block";
            correct.style.display = "block";
            strong.style.display = "block";
            password.style.backgroundColor = "transparent";
            psw.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
            requierements.style.display = "none";
        }


        let length = document.querySelector('#length_checked');
        let nolength = document.querySelector('#length_unchecked');
        let lowercase = document.querySelector('#lowercase_checked');
        let nolowercase = document.querySelector('#lowercase_unchecked');
        let uppercase = document.querySelector('#uppercase_checked');
        let nouppercase = document.querySelector('#uppercase_unchecked');
        let number = document.querySelector('#number_checked');
        let nonumber = document.querySelector('#number_unchecked');
        let special = document.querySelector('#special_checked');
        let nospecial = document.querySelector('#special_unchecked');
        let length_check = new RegExp(/.{8,}/);
        let lowercase_check = new RegExp(/[a-z]/gm);
        let uppercase_check = new RegExp(/[A-Z]/gm);
        let number_check = new RegExp(/[0-9]/gm);
        let special_check = new RegExp(/\W/gm);

        if (length_check.test(password.value)) {
            length.style.display = "block";
            nolength.style.display = "none";
        } else {
            length.style.display = "none";
            nolength.style.display = "block";
        }
        if (lowercase_check.test(password.value)) {
            lowercase.style.display = "block";
            nolowercase.style.display = "none";
        } else {
            lowercase.style.display = "none";
            nolowercase.style.display = "block";
        }
        if (uppercase_check.test(password.value)) {
            uppercase.style.display = "block";
            nouppercase.style.display = "none";
        } else {
            uppercase.style.display = "none";
            nouppercase.style.display = "block";
        }
        if (number_check.test(password.value)) {
            number.style.display = "block";
            nonumber.style.display = "none";
        } else {
            number.style.display = "none";
            nonumber.style.display = "block";
        }
        if (special_check.test(password.value)) {
            special.style.display = "block";
            nospecial.style.display = "none";
        } else {
            special.style.display = "none";
            nospecial.style.display = "block";
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
            <div class="requierementsn">
                <p>Le mot de passe doit contenir :</p>
                <ul>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Entre 8 et 20 caractères <i class="bi bi-x unchecked" id="length_uncheckedn"></i><i class="bi bi-check-lg checked" id="length_checkedn"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins une majuscule <i class="bi bi-x unchecked" id="uppercase_uncheckedn"></i><i class="bi bi-check-lg checked" id="uppercase_checkedn"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins une minuscule <i class="bi bi-x unchecked" id="lowercase_uncheckedn"></i><i class="bi bi-check-lg checked" id="lowercase_checkedn"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins un chiffre <i class="bi bi-x unchecked" id="number_uncheckedn"></i><i class="bi bi-check-lg checked" id="number_checkedn"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins un caractère spécial <i class="bi bi-x unchecked" id="special_uncheckedn"></i><i class="bi bi-check-lg checked" id="special_checkedn"></i></li>
                </ul>
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

            let password_strength = document.querySelector('.password_strengthn');
            password_strength.style.display = "flex";
            let tolow = document.querySelector('.tolown');
            let low = document.querySelector('.lown');
            let correct = document.querySelector('.correctn');
            let strong = document.querySelector('.strongn');

            let first_check = new RegExp(/^((?=.*[a-z])(?=.*[A-Z])).{4,}$|^((?=.*[a-z])(?=.*[0-9])).{4,}$|^(?=.*[a-z])(?=.*[!@#$%^&*]).{4,}$|^(?=.*[A-Z])(?=.*[0-9]).{4,}$|^(?=.*[A-Z])(?=.*[!@#$%^&*]).{4,}$|^(?=.*[0-9])(?=.*[!@#$%^&*]).{4,}$/);

            let second_check = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$|^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$|^(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$|^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$/);

            let last_check = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/);

            let psw = document.querySelector('.pswn');
            let requierements = document.querySelector('.requierementsn');

            if (passwordn.value.length == 0) {
                eye.style.display = "none";
                password_strength.style.display = "none";
                tolow.style.display = "none";
                low.style.display = "none";
                correct.style.display = "none";
                strong.style.display = "none";
                requierements.style.display = "none";
                psw.style.backgroundColor = "white";
            } else if (passwordn.value.length <= 3) {
                tolow.style.display = "block";
                low.style.display = "none";
                correct.style.display = "none";
                strong.style.display = "none";
                requierements.style.display = "flex";
                psw.style.backgroundColor = "white";
            } else if (first_check.test(passwordn.value)) {
                tolow.style.display = "block";
                low.style.display = "block";
                correct.style.display = "none";
                strong.style.display = "none";
                requierements.style.display = "flex";
                psw.style.backgroundColor = "white";
            }
            if (second_check.test(passwordn.value)) {
                tolow.style.display = "block";
                low.style.display = "block";
                correct.style.display = "block";
                strong.style.display = "none";
                requierements.style.display = "flex";
                psw.style.backgroundColor = "white";
            }
            if (last_check.test(passwordn.value)) {
                tolow.style.display = "block";
                low.style.display = "block";
                correct.style.display = "block";
                strong.style.display = "block";
                requierements.style.display = "none";
                passwordn.style.backgroundColor = "transparent";
                psw.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
            }

            let length = document.querySelector('#length_checkedn');
            let nolength = document.querySelector('#length_uncheckedn');
            let lowercase = document.querySelector('#lowercase_checkedn');
            let nolowercase = document.querySelector('#lowercase_uncheckedn');
            let uppercase = document.querySelector('#uppercase_checkedn');
            let nouppercase = document.querySelector('#uppercase_uncheckedn');
            let number = document.querySelector('#number_checkedn');
            let nonumber = document.querySelector('#number_uncheckedn');
            let special = document.querySelector('#special_checkedn');
            let nospecial = document.querySelector('#special_uncheckedn');
            let length_check = new RegExp(/.{8,}/);
            let lowercase_check = new RegExp(/[a-z]/gm);
            let uppercase_check = new RegExp(/[A-Z]/gm);
            let number_check = new RegExp(/[0-9]/gm);
            let special_check = new RegExp(/\W/gm);

            if (length_check.test(passwordn.value)) {
                length.style.display = "block";
                nolength.style.display = "none";
            } else {
                length.style.display = "none";
                nolength.style.display = "block";
            }
            if (lowercase_check.test(passwordn.value)) {
                lowercase.style.display = "block";
                nolowercase.style.display = "none";
            } else {
                lowercase.style.display = "none";
                nolowercase.style.display = "block";
            }
            if (uppercase_check.test(passwordn.value)) {
                uppercase.style.display = "block";
                nouppercase.style.display = "none";
            } else {
                uppercase.style.display = "none";
                nouppercase.style.display = "block";
            }
            if (number_check.test(passwordn.value)) {
                number.style.display = "block";
                nonumber.style.display = "none";
            } else {
                number.style.display = "none";
                nonumber.style.display = "block";
            }
            if (special_check.test(passwordn.value)) {
                special.style.display = "block";
                nospecial.style.display = "none";
            } else {
                special.style.display = "none";
                nospecial.style.display = "block";
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
            let psw = document.querySelector('.pswnc');

            if (passwordnc.value.length == 0) {
                eye.style.display = "none";
                psw.style.backgroundColor = "white";
            } else if (passwordnc.value == passwordn.value) {
                passwordnc.style.backgroundColor = "transparent";
                psw.style.backgroundColor = "rgba(0, 128, 0, 0.5)";
            }
            else {
                passwordnc.style.backgroundColor = "transparent";
                psw.style.backgroundColor = "rgba(255, 0, 0, 0.5)";
            }
        })

        let cancelbut = document.querySelector('.cancelbutp');
        cancelbut.addEventListener('click', () => {
            actual_pwd.innerHTML = old_pwd;
            modify_pwd.style.display = "flex";
            actual_pwd.style.flexDirection = "row";
            pwd.style.justifyContent = "space-between";
        })
    })

    let delete_accompte = document.querySelector('#delete_accompte');
    delete_accompte.addEventListener('click', () => {
        let delete_accompte_confirm = document.querySelector('.delete_accompte_confirm');
        let profil_infos = document.querySelector('.profil_infos');
        let profil_img = document.querySelector('.profil_img');
        profil_img.style.height = "30rem";
        profil_infos.style.display = "none";
        delete_accompte_confirm.style.display = "flex";
        let notdelete = document.querySelector('#notdelete');
        notdelete.addEventListener('click', () => {
            profil_infos.style.display = "flex";
            delete_accompte_confirm.style.display = "none";
            profil_img.style.height = "auto";
        })
    })



}