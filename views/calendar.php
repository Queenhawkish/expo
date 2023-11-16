<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>



<?php if (isset($_SESSION['admin'])) { ?>
    <a href="add_event_controller.php" class="add_event">
        <button>Ajouter un évènement</button>
    </a>
<?php } ?>
<p class="error"><?= $error["user_email"] ?? "" ?></p>
<div class="calendar">
    <?php foreach (Event::getNewYear() as $allyear => $year) {
        $thisyear = $year["YEAR(`date_end`)"]
    ?>

        <h2>Année <?= $thisyear ?></h2>

        <div class="year">
            <?php foreach (Type::getAllTypes() as $idType) { ?>
                <?php if (Event::getNewEvents($thisyear, $idType["id"]) != null) { ?>
                    <h3><?= $idType["type"] ?></h3>
                    <div class="calendar_event">
                        <?php foreach (Event::getNewEvents($thisyear, $idType["id"]) as $events => $event) { ?>
                            <div class="display_event">
                                <?php if (isset($_SESSION['admin'])) { ?>
                                    <div class="button_edit">
                                        <a href="edit_event_controller.php?id=<?= $event["event_id"] ?>" class="button_modify">Modifier</a>
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
                                                        <a href="calendar_controller.php?action=delete&id=<?= $event["event_id"] ?>"><button type="button" class="btn btn-primary delete_new_event">Oui</button></a>
                                                        <button type="button" class="btn btn-secondary delete_new_event" data-bs-dismiss="modal">Non</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="display_event">
                                    <div class="calendar_poster">
                                        <?php if (Album::existAlbum($event["event_id"])) { ?>
                                            <a href="event_controller.php?id=<?= $event["event_id"] ?>">
                                                <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="affiche" class="new_poster">
                                            </a>
                                        <?php } else { ?>
                                                <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="affiche" class="new_poster">
                                        <?php } ?>
                                    </div>
                                    <div class="event_information">
                                        <p class="date"><?= Form::getEventDate($event) ?></p>
                                        <h4><?= $event["event_name"] ?></h4>
                                        <p><?= $event["place"] ?> </p>
                                        <p class="event_description"><?= $event["description"] ?></p>

                                        <?php if (isset($_SESSION['admin'])) { ?>
                                            <div class="button_edit">
                                                <a href="add_photos_controller.php?id=<?= $event["event_id"] ?>" class="button_modify">Ajouter / supprimer des photos</a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if ($idType["id"] == 2 || $idType["id"] == 3) { ?>
                                        <?php if (isset($_SESSION['admin'])) { ?>
                                            <p>Participants :</p>
                                            <ul>
                                                <?php foreach (Participant::getParticipant($event["event_id"]) as $participant) { ?>
                                                    <li><?= $participant["email"] ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } else { ?>
                                            <div class="modal fade" id="exampleModalToggle<?= $event["event_id"] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Participer à <?= $event["event_name"] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <label for="user_email">Veuillez entrer votre adresse email :</label>
                                                                <input type="hidden" name="event_id" value="<?= $event["event_id"] ?>">
                                                                <input type="text" name="user_email" placeholder="doe.john@email.com">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary">Participer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary user_part" data-bs-target="#exampleModalToggle<?= $event["event_id"] ?>" data-bs-toggle="modal">Participer</button>
                                    <?php }
                                    } ?>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

    <?php } ?>
</div>
<div class="confirm_email">
    <div class="modal-body">
        <p>Un email de confirmation vous a été envoyé</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary">Fermer</button>
    </div>

</div>




<?php include 'components/footer.php'; ?>