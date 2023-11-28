<div class="scroll">
    <nav>
        <button class="burger_icon">
            <i class="bi bi-list"></i>
        </button>
        <div class="burger">
            <a href="home_controller.php" id="home">Présentation</a>
            <a href="calendar_controller.php" id="calendar">Programmation</a>
            <a href="gallery_controller.php" id="gallery">Galerie</a>
            <a href="about_controller.php" id="about">Contact</a>
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="disconnect_controller.php"><i class="bi bi-box-arrow-right"></i></a>
            <?php } ?>
        </div>
    </nav>
</div>