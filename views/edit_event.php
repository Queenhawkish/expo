<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>



<p class="error"><?= $error['event_add'] ?? "" ?></p>
<div class="form_add_event">
    <form action="" method="post" enctype="multipart/form-data">
        <legend>Modifier un évènement<legend>
                <p class="field">Champs obligatoire<i class="compel"> *</i></p>
                <div class="item_add_event">
                    <label for="event_name">Nom de l'évènement : <i class="compel">*</i></label>
                    <p class="error"><?= $error['event_name'] ?? "" ?></p>
                    <input type="text" name="event_name" placeholder="Ex. Exposition d'hiver" value="<?= htmlspecialchars($_POST["event_name"] ?? htmlspecialchars_decode($event["name"])) ?>">
                </div>
                <div class="item_add_event">
                    <label for="event_type">Type d'évènement : <i class="compel">*</i></label>
                    <p class="error"><?= $error['event_type'] ?? "" ?></p>
                    <select name="event_type" id="event_type">
                        <option selected disabled>Selectionner</option>
                        <?php foreach (Type::getAllTypes() as $type) { ?>
                            <option value=<?= $type['id'] ?> <?= isset($_POST["event_type"]) && $_POST["event_type"] == $type["id"] ? "selected" : ($event["id_type"] == $type["id"] ? "selected" : "") ?>><?= $type['type'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="item_add_event">
                    <label for="event_place">Lieu de l'évènement : <i class="compel">*</i></label>
                    <p class="error"><?= $error['event_place'] ?? "" ?></p>
                    <input type="text" name="event_place" placeholder="Ex. Alfortville" value="<?= htmlspecialchars($_POST["event_place"] ?? htmlspecialchars_decode($event["place"])) ?>">
                </div>
                <div class="item_add_event date_event">
                    <p>Dates de l'évènement : <i class="compel">*</i></p>
                    <div class="sortie">
                        <label for="event_sortie" class="add_date">Le :</label>
                        <p class="error"><?= $error['event_date'] ?? "" ?></p>
                        <input type="date" name="event_date" class="expo_date" value="<?= $_POST['event_date'] ?? $event["date_start"] ?>">
                    </div>
                    <div class="other_type">
                        <label for="event_first_date" class="add_date">Du :</label>
                        <p class="error"><?= $error['event_expo'] ?? "" ?></p>
                        <input type="date" name="event_first_date" class="expo_date" value="<?= $_POST['event_first_date'] ?? $event["date_start"] ?>">
                        <label for="event_second_date" class="add_date">Au :</label>
                        <p class="error"><?= $error['event_expo'] ?? "" ?></p>
                        <input type="date" name="event_second_date" class="expo_date" value="<?= $_POST['event_second_date'] ?? $event["date_end"] ?>">
                    </div>
                </div>
                <div class="item_add_event">
                    <label for="event_description">Description de l'évènement : <span>(facultatif)</span></label>
                    <textarea name="event_description" placeholder="Ex. Champignons en carton" cols="30" rows="10" value="<?= htmlspecialchars($_POST["event_description"] ?? htmlspecialchars_decode($event["description"]))?>"></textarea>
                </div>
                <p>Affiche actuel :</p>
                <img src="../assets/img/poster/<?=$event["poster"]?>" alt="affiche" class="modify_poster">
                <div class="item_add_event picture_event">
                    <div class="event_poster">
                        <p class="picture_poster">Photo d'affiche <i class="compel">*</i></p>
                        <p class="error"><?= $error['event_poster'] ?? "" ?></p>
                        <input class="pic_input" type="file" name="poster" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="item_add_event">
                    <button class="event_add">Ajouter l'évènement</button>
                </div>
    </form>
    
</div>
<?php include 'components/footer.php'; ?>