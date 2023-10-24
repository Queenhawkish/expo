<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<div class="form_old_event">
    <form action="" method="post">
        <h6 class="old_event">Ajouter un évènement futur</h6>
        <div class="item_old_event">
            <label for="event_name">Nom de l'exposition :</label>
            <input type="text" name="event_name" placeholder="Nom de l'exposition">
        </div>
        <div class="item_old_event">
            <label for="event_place">Lieu de l'exposition :</label>
            <input type="text" name="event_place" placeholder="Lieu de l'exposition">
        </div>
        <div class="item_old_event">
            <p>Dates de l'exposition :</p>
            <label for="event_first_date" class="adddate">Du :</label>
            <input type="date" name="event_first_date">
            <label for="event_second_date" class="adddate">Au :</label>
            <input type="date" name="event_second_date">
        </div>
        <div class="item_old_event">
            <p>Heure de l'exposition :</p>
            <label for="event_first_time" class="adddate">De :</label>
            <input type="time" name="event_first_time" class="time">
            <label for="event_second_time" class="adddate">À :</label>
            <input type="time" name="event_second_time" class="time">
        </div>
        <div class="item_old_event">
            <label for="event_description">Description de l'exposition :</label>
            <textarea name="event_description" placeholder="Description de l'exposition" cols="30" rows="10">
            </textarea>
        </div>
        <div class="item_old_event">
            <label for="event_nb_pic">Nombre de photo pour l'exposition :</label>
            <input type="number" placeholder="0" class="event_nb_pic">
        </div>
        <div class="add_picture">
            <p>Photo d'affiche</p>
            <input class="pic_input old" type="file" name="poster" accept="image/png, image/jpeg">
        </div>

        <div class="item_old_event">
            <button class="event_add">Ajouter l'exposition</button>
        </div>
    </form>
</div>

<div class="container">

    <h3>Année <?= $year ?></h3>

    <div class="calendar">
        <table>
            <thead>

                <tr>
                    <?php foreach ($name_month as $month => $month_number) {
                    ?>
                        <th><b class="big_screen"><?= $month ?></b><b class="small_screen"><?= $month_number ?></b></th>
                    <?php $month_number++;
                    } ?>
                </tr>

            </thead>
            <?php
            for ($day = 1; $day < 32; $day++) { ?>
                <tr>
                    <td id="<?= $name_month["Janvier"] ?>" <?php if ($day == $today && $name_month["Janvier"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>

                    <?php if ($year == 2023 && $day < 29) { ?>
                        <td id="<?= $name_month["Février"] ?>" <?php if ($day == $today && $name_month["Février"] == $this_month) { ?> class="today" <?php } ?> <?php if ($day == 5) { ?> class="orange" <?php } ?>><?= $day ?></td>
                    <?php } else if ($year == 2024 && $day < 30) { ?>
                        <td id="<?= $name_month["Février"] ?>" <?php if ($day == $today && $name_month["Février"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>

                    <td id="<?= $name_month["Mars"] ?>" <?php if ($day == $today && $name_month["Mars"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>

                    <?php if ($day < 31) { ?>
                        <td id="<?= $name_month["Avril"] ?>" <?php if ($day == $today && $name_month["Avril"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>

                    <td id="<?= $name_month["Mai"] ?>" <?php if ($day == $today && $name_month["Mai"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>

                    <?php if ($day < 31) { ?>
                        <td id="<?= $name_month["Juin"] ?>" <?php if ($day == $today && $name_month["Juin"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>

                    <td id="<?= $name_month["Juillet"] ?>" <?php if ($day == $today && $name_month["Juillet"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>

                    <td id="<?= $name_month["Août"] ?>" <?php if ($day == $today && $name_month["Août"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>

                    <?php if ($day < 31) { ?>
                        <td id="<?= $name_month["Septembre"] ?>" <?php if ($day == $today && $name_month["Septembre"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>

                    <td id="<?= $name_month["Octobre"] ?>" <?php if ($day == $today && $name_month["Octobre"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>

                    <?php if ($day < 31) { ?>
                        <td id="<?= $name_month["Novembre"] ?>" <?php if ($day == $today && $name_month["Novembre"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>

                    <td id="<?= $name_month["Décembre"] ?>" <?php if ($day == $today && $name_month["Décembre"] == $this_month) { ?> class="today" <?php } ?>><?= $day ?></td>
                </tr>
            <?php } ?>

        </table>

        <ul class="legend">
            <li class="legend_item">
                <div class="legend_color green"></div>Sorties
            </li>
            <li class="legend_item">
                <div class="legend_color orange"></div>Assemblées Générales
            </li>
            <li class="legend_item">
                <div class="legend_color fuchsia"></div>Expositions
            </li>
            <li class="legend_item">
                <div class="legend_color today"></div>Aujourd'hui
            </li>
            <li class="legend_item">
                <div class="legend_color select"></div>Evènement sélectionné
            </li>
        </ul>

    </div>

</div>

<div id="display_event">
    <p class="date">21/10/2023</p>
    <div class="display_event">
        <div class="event_title">
            <h4>Titre de l'évènement</h4>
        </div>
        <div class="event_infos">
            <div class="infos_event">
                <p>Lieux: </p>
                <p>Date: </p>
                <p>Participants: </p>
                <div class="butpart">
                    <button id="part">Je souhaite participer</button>
                    <button id="unpart">Je ne souhaite plus participer</button>
                </div>
            </div>
            <div class="participation">
                <div class="wishpart">
                    <label for="participant_number" id="partnumb">Nombre de participants</label>
                    <input type="number" id="numbpart" placeholder="0" name="number_participant">
                    <button class="nbpartvalidate">Valider</button>
                </div>
                <div id="part_infos">
                </div>
                <div class="register">
                    <button class="cancel">Annuler</button>
                    <button class="save">S'enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>