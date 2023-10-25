<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<div class="connection visitor">
    <h5>Espace visiteur</h5>
    <input type="text" name="login" placeholder="login" class="login">
    <input type="password" name="password" placeholder="password" class="login">
    <a href="home_controller.php">
        <button class="connect co">Connexion</button>
    </a>
    <a href="signup_controller.php">
        <button class="connect signupbut">Inscription</button>
    </a>
</div>

<div class="footer">
    <?php include 'components/footer.php'; ?>
</div>