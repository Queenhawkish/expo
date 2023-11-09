<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php var_dump(Event::getNewEvents()[0]) ?>
<?php if (isset($_SESSION['admin'])) { ?>
    <a href="add_event_controller.php">
        <button class="add_event">Ajouter un évènement</button>
    </a>
<?php } ?>
<div class="container calendar">
    <h2>Année <?= $year ?></h2>

    <div class="year">
        <?php foreach(Event::getNewEvents() as $event) { ?>
        <div id="display_event">
            <div class="item_event">
                <p class="date"><?= explode(" ",$event["date_start"])[0] ?> - <?= $event["date_end"] ?></p>
                <?php if (isset($_SESSION['admin'])) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div>
                    <img src="../assets/img/Front/assemblee.jpg" alt="" class="new_poster">
                    <?php if (isset($_SESSION['admin'])) { ?>
                        <button class="edit_date icon_edit_event edit_poster">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    <?php } ?>

                </div>
                <div class="event_information">
                    <div class="event_infos">
                        <div class="item_event">
                            <h4>Titre de l'évènement</h4>
                            <?php if (isset($_SESSION['admin'])) { ?>
                                <button class="edit_date icon_edit_event">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="infos_event">
                        <div class="item_event_place">
                            <p>Lieux: </p>
                            <?php if (isset($_SESSION['admin'])) { ?>
                                <button class="edit_date icon_edit_event">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            <?php } ?>
                        </div>
                        <div class="butpart">
                            <button class="part">Participer</button>
                            <?php if (isset($_SESSION['admin'])) { ?>
                                <button class="classify">Archiver</button>
                                <button class="classify">Supprimer</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="participant">
                    <label for="participant">Votre adresse email :</label>
                    <input type="text" placeholder="john.doe@email.fr" class="email_participant" name="email_participant">
                    <button class="validatepart">Valider</button>
                </div>

            </div>
        </div>
        <?php } ?>


    </div>


</div>

<?php include 'components/footer.php'; ?>