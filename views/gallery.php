<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<?php if (isset($_SESSION['admin'])) { ?>
    <a href="add_event_controller.php" class="add_event">
        <button>Ajouter un évènement</button>
    </a>
<?php } ?>

<div class="gallery gallerypage">
    <?php foreach (Event::getOldYear() as $allyear => $year) {
        $thisyear = $year["YEAR(`date_end`)"]
    ?>
        <h2><?= $thisyear ?></h2>
        <div class="year">
            <?php foreach (Event::getOldEvents($thisyear) as $events => $event) { ?>

                <div class="gallery_event">
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
                    <a href="event_controller.php?id=<?= $event["event_id"] ?>">
                        <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="<?= $event["poster"] ?>" class="new_poster">
                    </a>
                    <div class="gallery_event_infos">
                    <h4><?= $event["event_name"] ?></h4>
                        <ul>
                            <li><?= Form::getEventDate($event) ?></li>
                            <li>À <?= $event["place"] ?></li>
                        </ul>

                    </div>

                    <?php if (isset($_SESSION['admin'])) { ?>
                        <div class="button_edit">
                            <a href="add_photos_controller.php?id=<?= $event["event_id"] ?>" class="button_modify">Ajouter / supprimer des photos</a>
                        </div>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php include 'components/footer.php'; ?>