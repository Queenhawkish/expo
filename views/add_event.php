<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<div class="form_add_event">
    <?php if ($showform) { ?>
        <form method="post" enctype="multipart/form-data">
            <p class="error"><?= $error['event_add'] ?? "" ?></p>
            <h6>Ajouter un évènement</h6>
                    <p class="field">Champs obligatoire<i class="compel"> *</i></p>
                    <div class="item_add_event">
                        <label for="event_name">Nom de l'évènement : <i class="compel">*</i></label>
                        <p class="error"><?= $error['event_name'] ?? "" ?></p>
                        <input type="text" name="event_name" placeholder="Ex. Exposition d'hiver" value="<?= htmlspecialchars($_POST["event_name"] ?? "") ?>">
                    </div>
                    <div class="item_add_event">
                        <label for="event_type">Type d'évènement : <i class="compel">*</i></label>
                        <p class="error"><?= $error['event_type'] ?? "" ?></p>
                        <select name="event_type" id="event_type">
                            <option selected disabled>Selectionner</option>
                            <?php foreach (Type::getAllTypes() as $type) { ?>
                                <option value=<?= $type['id'] ?> <?= isset($_POST["event_type"]) && $_POST["event_type"] == $type["id"] ? "selected" : "" ?>><?= $type['type'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="item_add_event">
                        <label for="event_place">Lieu de l'évènement : <i class="compel">*</i></label>
                        <p class="error"><?= $error['event_place'] ?? "" ?></p>
                        <input type="text" name="event_place" placeholder="Ex. Alfortville" value="<?= htmlspecialchars($_POST["event_place"] ?? "") ?>">
                    </div>
                    <div class="item_add_event date_event">
                        <p>Dates de l'évènement : <i class="compel">*</i></p>
                        <div class="sortie">
                            <label for="event_sortie" class="add_date">Le :</label>
                            <p class="error"><?= $error['event_date'] ?? "" ?></p>
                            <input type="date" name="event_date" value="<?= $_POST['event_date'] ?? "" ?>">
                        </div>
                        <div class="other_type">
                            <label for="event_first_date" class="add_date">Du :</label>
                            <p class="error"><?= $error['event_expo'] ?? "" ?></p>
                            <input type="date" name="event_first_date" value="<?= $_POST['event_first_date'] ?? "" ?>">
                            <label for="event_second_date" class="add_date">Au :</label>
                            <p class="error"><?= $error['event_expo'] ?? "" ?></p>
                            <input type="date" name="event_second_date" value="<?= $_POST['event_second_date'] ?? "" ?>">
                        </div>
                    </div>
                    <div class="item_add_event">
                        <label for="event_description">Description de l'évènement : <span>(facultatif)</span></label>
                        <textarea name="event_description" placeholder="Ex. Champignons en carton" cols="30" rows="10"><?= htmlspecialchars($_POST["event_description"] ?? "") ?></textarea>
                    </div>
                    <div class="item_add_event picture_event">
                        <div class="event_poster">
                            <label>Photo d'affiche <i class="compel">*</i></label>
                            <p class="error"><?= $error['event_poster'] ?? "" ?></p>
                            <input type="file" name="poster" accept="image/png, image/jpeg">
                        </div>
                    </div>
                    <div class="item_add_event">
                        <button class="event_add">Ajouter l'évènement</button>
                    </div>
        </form>
    <?php } else { ?>
        <p class="error"><?= $error['event_add'] ?? "" ?></p>
        <p class="success">L'évènement a bien été ajouté</p>
        <?php if ($expo) { ?>
            <a href="add_photos_controller.php?id=<?= $id ?>" class="event_add">Ajouter les photos de l'exposition</a>
            <a href="../index.php" class="event_add">Retour à l'accueil</a>
        <?php } else { ?>
            <a href="../index.php" class="event_add">Retour à l'accueil</a>
    <?php }
    } ?>
</div>
<?php if ($showform == false) { ?>
    <div class="footer">
        <?php include 'components/footer.php'; ?>
    </div>
<?php } else {
    include 'components/footer.php';
} ?>