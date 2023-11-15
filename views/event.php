<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<div class="event_details">
    <a href="../controllers/gallery_controller.php" class="back">
        <button>Retour</button>
    </a>
    <div class="event_head">
        <div class="event_head_item">
            <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="affiche" class="event_head_poster">
        </div>
        <div class="event_head_item">
            <div class="event_infos_item">
                <div class="item_info">
                    <p><?= Form::getEventDate($event) ?></p>
                </div>
                <div class="item_info">
                    <p><?= $event["place"] ?> </p>
                </div>
            </div>
            <div class="item_info">
                <h4><?= $event["event_name"] ?></h4>
            </div>
            <div class="item_info">
                <dd><?= $event["description"] ?></dd>
            </div>
        </div>

    </div>
    <div class="event_gallery">
        <?php if (Album::existAlbum($album_name, $id)) {
            $id_album = Album::getIdAlbum($album_name);
        ?>
            <?php foreach (Picture::getAllPicture($id_album) as $picture) { ?>
                <div class="event_img <?= array_rand($rotate, $num = 1) ?>">
                    <img src="../assets/img/<?= $album_name . "/" . $picture["name"] ?>" alt="event image" class="gallery_image">
                </div>
        <?php }
        } ?>
    </div>
</div>


<?php include 'components/footer.php'; ?>