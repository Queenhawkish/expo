<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>



<?php if (isset($_SESSION['admin'])) { ?>
    <a href="add_event_controller.php">
        <button class="add_event">Ajouter un évènement</button>
    </a>
<?php } ?>
<div class="container calendar">
    <?php foreach (Event::getNewYear() as $allyear => $year) { 
        $thisyear = $year["YEAR(`date_start`)"] 
        ?>
        
    <h2>Année <?= $thisyear ?></h2>

    <div class="year">
        <?php foreach(Event::getNewEvents($thisyear) as $event => $value) { ?>
            <?php var_dump($value["poster"]) ?>
        <div id="display_event">
            <div class="item_event">
                <p class="date">Date</p>
                <?php if (isset($_SESSION['admin'])) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div class="calendar_poster">
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

    <?php } ?>


</div>

<?php include 'components/footer.php'; ?>