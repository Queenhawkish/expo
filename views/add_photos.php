<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<form class="add_photos" method="post" enctype="multipart/form-data">
    <div class="event_picture">
        <label for="event_nb_pic">Nombre de photo pour l'exposition :</label>
        <input type="number" placeholder="0" class="event_nb_pic" name="number_picture" value="<?= $_POST["number_picture"] ?? "" ?>">
    </div>

    <div class="pictures">
        <div class="add_pictures">
        </div>
    </div>
    <a href="" class="add_gallery">
        <button>Ajouter à la galerie</button>
    </a>
</form>
<div class="footer">
<?php include 'components/footer.php'; ?>
</div>