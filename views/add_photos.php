<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>



<div class="add_album">
    <form class="add_photos" method="post" enctype="multipart/form-data">
        <p class="error"><?= $success ?? "" ?></p>
        <p class="album">Album </p>
        <p class="album"><?= $album_name ?></p>
        <div class="event_picture">
            <div class="add_picture">
                <p class="error"><?= $error["picture"] ?? "" ?></p>
                <input id="input_image" class="pic_input" type="file" name="picture" accept="image/png, image/jpeg">
            </div>
        </div>
        <div class="add_gallery">
            <button>Ajouter la photo à l'exposition</button>
            <a href="gallery_controller.php" class="go_back">Retour à la galerie</a>
        </div>
    </form>
    <?php if (Album::existAlbum($id)) {
        $id_album = Album::getIdAlbum($album_name);
    ?>
        <div class="show_images">
            <?php foreach (Picture::getAllPicture($id_album) as $picture) { ?>
                <div class="new_picture">
                    <img src="../assets/img/<?= $album_name . "/" . $picture["name"] ?>" alt="<?= $picture["name"] ?>" class="show_image">
                    <form method="post">
                        <button name="id_picture" value="<?= $picture["id"] ?>" class="delete_picture">Supprimer</a>
                    </form>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<?php include 'components/footer.php'; ?>