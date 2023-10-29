<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<div class="form_new_event">
    <form action="" method="post">
        <h6 class="old_event">Ajouter un évènement futur</h6>
        <div class="item_old_event">
            <label for="event_name">Nom de l'exposition :</label>
            <input type="text" name="event_name" placeholder="Nom de l'exposition">
        </div>
        <div class="item_old_event">
            <label for="event_place">Lieu de l'exposition :</label>
            <input type="text" name="event_place" placeholder="Lieu de l'exposition">
        </div>
        <div class="item_old_event">
            <p>Dates de l'exposition :</p>
            <label for="event_first_date" class="adddate">Du :</label>
            <input type="date" name="event_first_date">
            <label for="event_second_date" class="adddate">Au :</label>
            <input type="date" name="event_second_date">
        </div>
        <div class="item_old_event">
            <p>Heure de l'exposition :</p>
            <label for="event_first_time" class="adddate">De :</label>
            <input type="time" name="event_first_time" class="time">
            <label for="event_second_time" class="adddate">À :</label>
            <input type="time" name="event_second_time" class="time">
        </div>
        <div class="item_old_event">
            <label for="event_description">Description de l'exposition :</label>
            <textarea name="event_description" placeholder="Description de l'exposition" cols="30" rows="10">
            </textarea>
        </div>
        <div class="add_picture">
            <p>Photo d'affiche</p>
            <input class="pic_input old" type="file" name="poster" accept="image/png, image/jpeg">
        </div>

        <div class="item_old_event">
            <button class="event_add">Ajouter l'exposition</button>
        </div>
    </form>
</div>

<?php include 'components/footer.php'; ?>  