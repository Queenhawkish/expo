<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<form class="connection" method="POST">
    <h5>Connexion à l'espace administrateur</h5>
    <input type="text" name="login" placeholder="login" class="login" value="<?= htmlspecialchars($_POST["login"] ?? "") ?>">
    <p class="error"><?= $error["login"] ?? "" ?></p>
    <input type="password" name="password" placeholder="password" class="login">
    <p class="error"><?= $error["password"] ?? "" ?></p>
    <a href="calendar_controller.php">
        <button class="connect co">Connexion</button>
    </a>
</form>

<div class="footer">
    <?php include 'components/footer.php'; ?>
</div>