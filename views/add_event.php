<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<div class="form_add_event">
    <form action="" method="post">
        <h6 class="add_event_title">Ajouter un évènement</h6>
        <div class="item_add_event">
            <label for="event_name">Nom de l'évènement :</label>
            <input type="text" name="event_name" placeholder="Nom de l'évènement">
        </div>
        <div class="item_add_event">
            <label for="event_type">Type d'évènement :</label>
            <select name="event_type" id="event_type">
                <option value="default">Selectionner</option>
                <option value="exposition">Exposition</option>
                <option value="sortie">Sortie</option>
                <option value="assemblee_generale">Assemblée générale</option>
            </select>
        </div>
        <div class="item_add_event">
            <label for="event_place">Lieu de l'évènement :</label>
            <input type="text" name="event_place" placeholder="Lieu de l'évènement">
        </div>
        <div class="item_add_event date_event">
            <p>Dates de l'évènement :</p>
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
            <label for="event_description">Description de l'évènement :</label>
            <textarea name="event_description" placeholder="Description de l'évènement" cols="30" rows="10">
            </textarea>
        </div>
        <div class="item_add_event picture_event">
            <div class="event_poster">
                <p class="picture_poster">Photo d'affiche</p>
                <input class="pic_input" type="file" name="poster" accept="image/png, image/jpeg">
            </div>
        </div>
        <div class="item_add_event">
            <?php if ($exposition == true) { ?>
                <a href="add_photos_controller.php">
                    <p class="event_add">Ajouter l'évènement</p>
                </a>
            <?php } else { ?>
            <button class="event_add">Ajouter l'évènement</button>
            <?php } ?>
        </div>
    </form>
</div>
<?php include 'components/footer.php'; ?>