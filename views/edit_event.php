<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<div class="form_add_event">
    <form action="" method="post">
        <h6 class="add_event_title">Modifier l'exposition "Nom de l'exposition"</h6>
        <div class="item_add_event">
            <label for="event_name">Nom de l'exposition :</label>
            <input type="text" name="event_name" placeholder="Nom de l'exposition">
        </div>
        <div class="item_add_event">
            <label for="event_place">Lieu de l'exposition :</label>
            <input type="text" name="event_place" placeholder="Lieu de l'exposition">
        </div>
        <div class="item_add_event date_event">
            <p>Dates de l'exposition :</p>
            <div class="sortie">
                <label for="event_sortie" class="add_date">Le :</label>
                <input type="datetime-local" name="event_sortie" class="expo_date">
            </div>
            <div class="other_type">
                <label for="event_first_date" class="add_date">Du :</label>
                <input type="datetime-local" name="event_first_date" class="expo_date">
                <label for="event_second_date" class="add_date">Au :</label>
                <input type="datetime-local" name="event_second_date" class="expo_date">
            </div>
        </div>
        <div class="item_add_event">
            <label for="event_description">Description de l'exposition :</label>
            <textarea name="event_description" placeholder="Description de l'exposition" cols="30" rows="10">
            </textarea>
        </div>
        <div class="item_add_event">
            <div class="event_poster_modify">
                <p class="picture_poster">Photo d'affiche</p>
                <input class="pic_input" type="file" name="poster" accept="image/png, image/jpeg">
            </div>
        </div>
        
        <div class="item_add_event">
            <button class="event_add">Modifier</button>
        </div>
    </form>
</div>

<?php include 'components/footer.php'; ?>