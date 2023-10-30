<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<div class="connection visitor">
    <h5>Espace visiteur</h5>
    <input type="text" name="login" placeholder="doe.john@email.com" class="login">
    <input type="password" name="password" placeholder="password" class="login">
    <a href="home_controller.php">
        <button class="connect co">Connexion</button>
    </a>
    <a href="signup_controller.php">
        <button class="connect signupbut sign">Inscription</button>
    </a>
</div>

<div class="profil">
    <div class="profil_img">
    </div>
    <div class="profil_infos">
        <div class="profil_item">
            <h5>Votre profil</h5>
            <ul>
                <li class="profil_info lastname">
                    <p class="actual_lastname">Nom : Doe</p><button class="profilbut" id="modify_lastname">Modifier</button>
                </li>
                <li class="profil_info firstname">
                    <p class="actual_firstname">Prénom : John</p><button class="profilbut" id="modify_firstname">Modifier</button>
                </li>
                <li class="profil_info email">
                    <p class="actual_email">Email : doe.john@email.com</p><button class="profilbut" id="modify_email">Modifier</button>
                </li>
                <li class="modifybut pwd">
                    <p class="actual_pwd"></p><button class="profilbut" id="modify_pwd">Modifier le mot de passe</button>
                </li> 
                <li class="mofifybut"><button class="profilbut delete accompte" id="delete_accompte">Supprimer mon compte</button></li>
                </li>
            </ul>
        </div>
        <div class="profil_item event_signup">
            <h5>Évènements inscrits</h5>
            <ul class="signup_event">
                <li class="signup_event_item name-event">Nom de l'évènement</li>
                <li class="signup_event_item">Date de l'évènement</li>
                <li class="modifybut"><button class="profilbut delete">Se désinscrire</button></li>
            </ul>
        </div>
    </div>
    <div class="delete_accompte_confirm">
        <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
        <div class="deletebut">
            <button class="profilbut delete"><a href="">Oui</a></button>
            <button class="profilbut delete" id="notdelete">Non</button>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>