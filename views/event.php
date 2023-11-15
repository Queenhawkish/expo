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
        </div>
        <div class="event_img second">
            <img src="https://picsum.photos/300/300?random=2" alt="event image">
        </div>
        <div class="event_img fourth">
            <img src="https://picsum.photos/300/300?random=3" alt="event image">
        </div>
        <div class="event_img third">
            <img src="https://picsum.photos/300/300?random=4" alt="event image">
        </div>
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=5" alt="event image">
        </div>
        <div class="event_img">
            <img src="https://picsum.photos/300/300?random=6" alt="event image">
        </div>
        <div class="event_img first">
            <img src="https://picsum.photos/300/300?random=7" alt="event image">
        </div>
        <div class="event_img fourth">
            <img src="https://picsum.photos/300/300?random=8" alt="event image">
        </div>
    </div>
</div>


<?php include 'components/footer.php'; ?>