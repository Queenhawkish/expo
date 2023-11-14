<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<div class="event_details">
    <a href="../controllers/gallery_controller.php" class="back">
        <button>Retour</button>
    </a>
    <?php if (isset($_SESSION["admin"])) { ?>
        <a href="edit_event_controller.php?id=<?= $event["event_id"] ?>" class="button_modify">Modifier</a>
    <?php } ?>
    <div class="event_poster">
        <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="affiche" class="new_poster">
    </div>
    <div class="info_display">
        <div class="item_info">
            <p class="info_detail event_date">06/12/2022 </p>
        </div>
        <div class="item_info">
            <p class="info_detail event_place">Alfortville </p>
        </div>
    </div>
    <div class="title">
        <h4 class="event_details_title">Exposition de décembre </h4>
    </div>
    <div class="description_display">
        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptatem rem fugiat ipsam quaerat, nulla autem aliquam doloremque iste modi? Doloremque maiores atque illum sed et cum unde consequuntur ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nesciunt, adipisci recusandae, earum accusantium architecto blanditiis, odio in officiis eius ad provident laboriosam modi cumque consequuntur? Aliquid quo praesentium hic. </p>
    </div>
    <div class="gallery_event">
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=1" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img second">
            <img src="https://picsum.photos/300/300?random=2" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img fourth">
            <img src="https://picsum.photos/300/300?random=3" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img third">
            <img src="https://picsum.photos/300/300?random=4" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=5" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img">
            <img src="https://picsum.photos/300/300?random=6" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=7" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img fourth">
            <img src="https://picsum.photos/300/300?random=8" alt="event image">
            <?php if (isset($_SESSION["admin"])) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($_SESSION["admin"])) { ?>
        <div class="button_event">
            <button class="edit_photo">Ajouter des photos</button>
            <button type="button" class="cancel" data-bs-toggle="modal" data-bs-target="#modal<?= $event["event_id"] ?>">
                Supprimer
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal<?= $event["event_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header delete_confirm">
                            <h4 class="modal-title fs-5" id="exampleModalLabel">Êtes-vous sûr de vouloir supprimer "<?= $event["event_name"] ?>"</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer button_confirm">
                            <a href="event_controller.php?action=delete&id=<?= $event["event_id"] ?>"><button type="button" class="btn btn-primary delete_new_event">Oui</button></a>
                            <button type="button" class="btn btn-secondary delete_new_event" data-bs-dismiss="modal">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add_photos">
            <div class="event_picture">
                <label for="event_nb_pic">Nombre de photo pour l'exposition :</label>
                <input type="number" placeholder="0" class="event_nb_pic">
            </div>

            <div class="pictures">
                <div class="add_pictures">
                </div>
                <button class="add">Ajouter</button>
            </div>
        </div>
    <?php } ?>
</div>


<?php include 'components/footer.php'; ?>