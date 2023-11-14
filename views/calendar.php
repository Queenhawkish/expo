<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<?php if (isset($_SESSION['admin'])) { ?>
    <a href="add_event_controller.php" class="add_event">
        <button>Ajouter un évènement</button>
    </a>
<?php } ?>
<?php if ($showform) { ?>
    <p class="success">Un email de confirmation vous a été envoyé à l'adresse suivante : <br> <?php $_POST['user_email'] ?></p>
<?php } ?>
<div class="calendar">
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
                                            <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="affiche" class="new_poster">

                                        </div>
                                        <div class="event_information">
                                            <p class="date"><?= getEventDate($event) ?></p>
                                            <h4><?= $event["event_name"] ?></h4>
                                            <p><?= $event["place"] ?> </p>
                                            <p class="event_description"><?= $event["description"] ?></p>
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
                                            <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="" class="new_poster">

                                        </div>
                                        <div class="event_information">
                                            <p class="date"><?= getEventDate($event) ?></p>
                                            <h4><?= $event["event_name"] ?></h4>
                                            <p><?= $event["place"] ?> </p>
                                            <p class="event_description"><?= $event["description"] ?></p>
                                        </div>
                                        <form class="butpart" method="post">
                                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Participation</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <label for="user_email">Veuillez entrer votre adresse email :</label>
                                                                <input type="text" name="user_email" placeholder="doe.john@email.com">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary">Participer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Un email de confirmation vous a été envoyé à l'adresse suivante : <br> <?php $_POST['user_email'] ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Participer</button>
                                        </form>
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
                                            <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="" class="new_poster">

                                        </div>
                                        <div class="event_information">
                                            <p class="date"><?= getEventDate($event) ?></p>
                                            <h4><?= $event["event_name"] ?></h4>
                                            <p><?= $event["place"] ?> </p>
                                            <p class="event_description"><?= $event["description"] ?></p>
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


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Show a second modal and hide this one with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button>


<?php include 'components/footer.php'; ?>