<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<div class="add_album">
    <form class="add_photos" method="post" enctype="multipart/form-data">
        <div class="event_picture">
            <label for="album_name">Quel serait le nom de l'album ?</label>
            <input type="text" name="album_name" placeholder="Ex. Exposition d'hiver" value="<?= htmlspecialchars($_POST["album_name"] ?? "") ?>">
            <div class="add_picture">
                <input id="input_image" class="pic_input" type="file" name="pic" accept="image/png, image/jpeg">
            </div>
        </div>

        <div class="pictures">
            <div class="add_pictures">
            </div>
        </div>
        <div class="add_gallery">
            <button>Ajouter les photos à l'exposition</button>
            <a href="gallery_controller.php" class="go_back">Retour à la galerie</a>
        </div>
    </form>
    <div class="show_images">
        <img id="image" class="show_image" alt="Photo">
    </div>
</div>
<?php include 'components/footer.php'; ?>