<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<form class="signup">
    <div class="form_signup">
        <h5>Création d'un compte</h5>
        <div class="signup_item">
            <label for="user_lastname">Veuillez saisir votre nom</label>
            <input type="text" name="user_lastname" placeholder="Doe">
        </div>
        <div class="signup_item">
            <label for="user_firstname">Veuillez saisir votre prénom</label>
            <input type="text" name="user_firstname" placeholder="John">
        </div>
        <div class="signup_item">
            <label for="user_email">Veuillez saisir votre adresse email</label>
            <input type="email" name="user_email" placeholder="doe.john@email.com">
        </div>
        <div class="signup_item">
            <label for="user_password">Veuillez saisir votre mot de passe</label>
            <div class="psw">
                <input type="password" name="user_password" class="password">
                <i class="bi bi-eye eye"></i>
                <i class="bi bi-eye-slash eye-slash"></i>
            </div>
            <div class="password_strength">
                <div class="tolow"></div>
                <div class="low"></div>
                <div class="correct"></div>
                <div class="strong"></div>
            </div>
            <div class="requierements">
                <p>Le mot de passe doit contenir :</p>
                <ul>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Entre 8 et 20 caractères <i class="bi bi-x unchecked" id="length_unchecked"></i><i class="bi bi-check-lg checked" id="length_checked"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins une majuscule <i class="bi bi-x unchecked" id="uppercase_unchecked"></i><i class="bi bi-check-lg checked" id="uppercase_checked"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins une minuscule <i class="bi bi-x unchecked" id="lowercase_unchecked"></i><i class="bi bi-check-lg checked" id="lowercase_checked"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins un chiffre <i class="bi bi-x unchecked" id="number_unchecked"></i><i class="bi bi-check-lg checked" id="number_checked"></i></li>
                    <li class="requierement"><i class="bi bi-asterisk star"></i> Au moins un caractère spécial <i class="bi bi-x unchecked" id="special_unchecked"></i><i class="bi bi-check-lg checked" id="special_checked"></i></li>
                </ul>
            </div>
        </div>
        <div class="signup_item">
            <label for="user_password_confirm">Veuillez confirmer votre mot de passe</label>
            <div class="pswc">
                <input type="password" name="user_password_confirm" class="passwordc">
                <i class="bi bi-eye eyec"></i>
                <i class="bi bi-eye-slash eye-slashc"></i>
            </div>
        </div>
        <div class="signup_item">
            <a href="connection_visitor_controller.php">
                <button class="connect signupbut">S'inscrire</button>
            </a>
        </div>
    </div>
</form>


<?php include 'components/footer.php'; ?>