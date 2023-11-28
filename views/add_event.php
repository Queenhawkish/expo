<!-- J'inclue les composants de ma page : l'entête et la barre de navigation -->
<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<!-- Je crée le formulaire afin de récupérer les données -->
<div class="form_add_event">
    <?php if ($showform) { ?>
        <form method="post" enctype="multipart/form-data">
            <!-- Lorsque le formulaire est envoyé une vérification est faite, 
            si une erreur est détectée elle est affichée dans un paragraphe avec la class error comme ci-dessous-->
            <p class="error"><?= $error['event_add'] ?? "" ?></p>
            <h6>Ajouter un évènement</h6>
            <p class="field">Champs obligatoire<i class="compel"> *</i></p>
            <div class="item_add_event">
                <label for="event_name">Nom de l'évènement : <i class="compel">*</i></label>
                <p class="error"><?= $error['event_name'] ?? "" ?></p>
                <!-- Si le formulaire est envoyer mais possède une erreur je sécurise les données à l'aide d'un "htmlspecialchars" 
                et les laisses dans les inputs afin que l'administrateur n'ai pas à toujours devoir les rerentrer . Exemple ci-dessous -->
                <input type="text" name="event_name" placeholder="Ex. Exposition d'hiver" value="<?= htmlspecialchars($_POST["event_name"] ?? "") ?>">
            </div>
            <div class="item_add_event">
                <label for="event_type">Type d'évènement : <i class="compel">*</i></label>
                <!-- Si une erreur est détécté lors de la récupération du type, l'erreur sera indiquer ci-dessous -->
                <p class="error"><?= $error['event_type'] ?? "" ?></p>
                <select name="event_type" id="event_type">
                    <option selected disabled>Selectionner</option>
                    <!-- J'utilise ici le model Type afin de récupéré et afficher tout les types entrée dans la base de données. Je recours à la fonction 
                    isset afin de laisser la donnée en cas d'erreur -->
                    <?php foreach (Type::getAllTypes() as $type) { ?>
                        <option value=<?= $type['id'] ?> <?= isset($_POST["event_type"]) && $_POST["event_type"] == $type["id"] ? "selected" : "" ?>><?= $type['type'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="item_add_event">
                <label for="event_place">Lieu de l'évènement : <i class="compel">*</i></label>
                <!-- Si une erreur est détécté lors de la récupération du lieu, l'erreur sera indiquer ci-dessous -->
                <p class="error"><?= $error['event_place'] ?? "" ?></p>
                <!-- Si la donnée est récupéré elle est laisser tel quel dans son input -->
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
                <textarea name="event_description" placeholder="Ex. Champignons en carton" cols="30" rows="5"><?= htmlspecialchars($_POST["event_description"] ?? "") ?></textarea>
            </div>
            <div class="item_add_event picture_event">
                <div class="event_poster">
                    <label>Photo d'affiche <i class="compel">*</i></label>
                    <p class="error"><?= $error['event_poster'] ?? "" ?></p>
                    <input type="file" name="poster" accept="image/png, image/jpeg">
                </div>
            </div>
            <div class="button_item">
                <button class="event_add">Ajouter l'évènement</button>
                <a href="gallery_controller.php" class="go_back">Retour à la page galerie</a>
                <a href="calendar_controller.php" class="go_back">Retour à la page programmation</a>
            </div>
        </form>
    <?php } else { ?>
        <p class="error"><?= $error['event_add'] ?? "" ?></p>
        <p class="success">L'évènement a bien été ajouté</p>
        <a href="add_photos_controller.php?id=<?= $id ?>" class="event_add">Ajouter les photos de l'évènement</a>
        <a href="../index.php" class="event_add">Retour à l'accueil</a>
    <?php } ?>
</div>
<?php if ($showform == false) { ?>
    <div class="footer">
        <?php include 'components/footer.php'; ?>
    </div>
<?php } else {
    include 'components/footer.php';
} ?>