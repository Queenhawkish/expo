<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<?php if (isset($_SESSION['admin'])) { ?>
    <a href="add_event_controller.php" class="add_event">
        <button>Ajouter un évènement</button>
    </a>
<?php } ?>
<div class="container calendar">
    <?php foreach (Event::getNewYear() as $allyear => $year) {
        $thisyear = $year["YEAR(`date_start`)"]
    ?>

        <h2>Année <?= $thisyear ?></h2>

        <div class="year">
            <?php foreach (Type::getAllTypes() as $idType) { ?>
                <?php if ($idType["id"] == 1) { ?>
                    <?php if (Event::getNewEvents($thisyear, $idType["id"]) != null) { ?>
                        <h3>Exposition</h3>
                        <div class="year_item">
                            <?php foreach (Event::getNewEvents($thisyear, $idType["id"]) as $events => $event) { ?>
                                <div class="display_event">
                                    <?php if (isset($_SESSION['admin'])) { ?>
                                        <div class="button_edit">
                                            <a href="edit_event_controller.php?id=<?= $event["event_id"]?>" class="button_modify">Modifier</a>
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
                                            <img src="../assets/img/poster/<?=$event["poster"]?>" alt="affiche" class="new_poster">

                                        </div>
                                        <div class="event_information">
                                            <p class="date"><?= getEventDate($event) ?></p>
                                            <h4><?= $event["event_name"] ?></h4>
                                            <p><?= $event["place"] ?> </p>
                                        </div>
                                        <div class="bupart">
                                            <a href="event_controller.php?id=<?= $event["event_id"] ?>" class="button_participate">Participer</a>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    <?php }
                } else if ($idType["id"] == 2) { ?>
                    <?php if (Event::getNewEvents($thisyear, $idType["id"]) != null) { ?>
                        <h3>Sortie</h3>
                        <div class="year_item">
                            <?php foreach (Event::getNewEvents($thisyear, $idType["id"]) as $events => $event) { ?>
                                <div class="display_event">
                                    <?php if (isset($_SESSION['admin'])) { ?>
                                        <div class="button_edit">
                                            <a href="edit_event_controller.php" class="button_modify">Modifier</a>
                                            <button class="delete_event">Supprimer</button>
                                        </div>
                                    <?php } ?>
                                    <div class="display_event">
                                        <div class="calendar_poster">
                                            <img src="../assets/img/poster/<?= $event["poster"]?>" alt="" class="new_poster">

                                        </div>
                                        <div class="event_information">
                                            <p class="date"><?= getEventDate($event) ?></p>
                                            <h4><?= $event["event_name"] ?></h4>
                                            <p><?= $event["place"] ?> </p>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    <?php }
                } else if ($idType["id"] == 3) { ?>
                    <?php if (Event::getNewEvents($thisyear, $idType["id"]) != null) { ?>
                        <h3>Assemblée Générale</h3>
                        <div class="year_item">
                            <?php foreach (Event::getNewEvents($thisyear, $idType["id"]) as $events => $event) { ?>
                                <div class="display_event">
                                    <?php if (isset($_SESSION['admin'])) { ?>
                                        <div class="button_edit">
                                            <a href="edit_event_controller.php" class="button_modify">Modifier</a>
                                            <button class="delete_event">Supprimer</button>
                                        </div>
                                    <?php } ?>
                                    <div class="display_event">
                                        <div class="calendar_poster">
                                            <img src="../assets/img/poster/<?= $event["poster"]?>" alt="" class="new_poster">

                                        </div>
                                        <div class="event_information">
                                            <p class="date"><?= getEventDate($event) ?></p>
                                            <h4><?= $event["event_name"] ?></h4>
                                            <p><?= $event["place"] ?> </p>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            <?php } ?>
        </div>

    <?php } ?>
</div>



</div>

<?php include 'components/footer.php'; ?>