<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<div class="event_details">
    <a href="../controllers/gallery_controller.php" class="back">
        <button>Retour</button>
    </a>
    <div class="card_event_img">
    </div>
    <div class="info_display">
        <div class="item_info">
            <p class="info_detail event_date">06/12/2022 </p>
            <?php if ($adminconnect == true) { ?>
                <button class="edit_date icon_edit">
                    <i class="bi bi-pencil-square"></i>
                </button>
            <?php } ?>
        </div>
        <div class="item_info">
            <p class="info_detail event_place">Alfortville </p>
            <?php if ($adminconnect == true) { ?>
                <button class="edit_place icon_edit">
                    <i class="bi bi-pencil-square"></i>
                </button>
            <?php } ?>
        </div>
    </div>
    <div class="title">
        <h4 class="event_details_title">Exposition de décembre </h4>
        <?php if ($adminconnect == true) { ?>
            <button class="edit_title icon_edit">
                <i class="bi bi-pencil-square"></i>
            </button>
        <?php } ?>
    </div>
    <div class="description_display">
        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptatem rem fugiat ipsam quaerat, nulla autem aliquam doloremque iste modi? Doloremque maiores atque illum sed et cum unde consequuntur ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nesciunt, adipisci recusandae, earum accusantium architecto blanditiis, odio in officiis eius ad provident laboriosam modi cumque consequuntur? Aliquid quo praesentium hic. </p>
        <?php if ($adminconnect == true) { ?>
            <button class="edit_description icon_edit">
                <i class="bi bi-pencil-square"></i>
            </button>
        <?php } ?>
    </div>
    <div class="gallery_event">
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=1" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img second">
            <img src="https://picsum.photos/300/300?random=2" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img fourth">
            <img src="https://picsum.photos/300/300?random=3" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img third">
            <img src="https://picsum.photos/300/300?random=4" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=5" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img">
            <img src="https://picsum.photos/300/300?random=6" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=7" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
        <div class="event_img fourth">
            <img src="https://picsum.photos/300/300?random=8" alt="event image">
            <?php if ($adminconnect == true) { ?>
                <a href="" class="delete_picture" title="Supprimer"><i class="bi bi-trash3-fill"></i></a>
            <?php } ?>
        </div>
    </div>
    <?php if ($adminconnect == true) { ?>
        <div class="button_event">
            <button class="edit_photo">Ajouter des photos</button>
            <a href="../controllers/event_controller.php" class="delete">
                <button>Supprimer l'exposition</button>
            </a>
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