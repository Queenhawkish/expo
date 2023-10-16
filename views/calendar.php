<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>


<h3>Année <?= $year ?></h3>

<div class="contain">
    <table>
        <thead>
            
            <tr>
                <?php foreach ($name_month as $month => $month_number) {
                 ?>
                <th><b class="big_screen"><?= $month ?></b><b class="small_screen"><?= $month_number ?></b></th>
                <?php $month_number++; } ?>
            </tr>
            
        </thead>
        <?php 
            for ($day = 1; $day < 32; $day++){ ?>
        <tr>
            <td id="<?= $name_month["Janvier"]?>" <?php if ($day == $today && $name_month["Janvier"] == $this_month){ ?> class= "today" <?php } ?>><button id="event"><?= $day ?></button></td>

            <?php if ($year == 2023 && $day < 29){ ?>
            <td id="<?= $name_month["Février"]?>" <?php if ($day == $today && $name_month["Février"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            <?php } else if ($year == 2024 && $day < 30){ ?>
            <td id="<?= $name_month["Février"]?>" <?php if ($day == $today && $name_month["Février"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            <?php } else { ?>
            <td></td>
            <?php } ?>

            <td id="<?= $name_month["Mars"]?>" <?php if ($day == $today && $name_month["Mars"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>

            <?php if ($day < 31){ ?>
            <td id="<?= $name_month["Avril"]?>" <?php if ($day == $today && $name_month["Avril"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            <?php } else { ?>
            <td></td>
            <?php } ?>

            <td id="<?= $name_month["Mai"]?>" <?php if ($day == $today && $name_month["Mai"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>

            <?php if ($day < 31){ ?>
            <td id="<?= $name_month["Juin"]?>" <?php if ($day == $today && $name_month["Juin"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            <?php } else { ?>
            <td></td>
            <?php } ?>

            <td id="<?= $name_month["Juillet"]?>" <?php if ($day == $today && $name_month["Juillet"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>

            <td id="<?= $name_month["Août"]?>" <?php if ($day == $today && $name_month["Août"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            
            <?php if ($day < 31){ ?>
            <td id="<?= $name_month["Septembre"]?>" <?php if ($day == $today && $name_month["Septembre"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            <?php } else { ?>
            <td></td>
            <?php } ?>
            
            <td id="<?= $name_month["Octobre"]?>" <?php if ($day == $today && $name_month["Octobre"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            
            <?php if ($day < 31){ ?>
            <td id="<?= $name_month["Novembre"]?>" <?php if ($day == $today && $name_month["Novembre"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
            <?php } else { ?>
            <td></td>
            <?php } ?>
            
            <td id="<?= $name_month["Décembre"]?>" <?php if ($day == $today && $name_month["Décembre"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>
        </tr>
        <?php } ?>
        
    </table>

        <ul class="legend">
            <li class="legend_item"><div class="legend_color green"></div>Sorties</li>
            <li class="legend_item"><div class="legend_color orange"></div>Assemblées Générales</li>
            <li class="legend_item"><div class="legend_color fuchsia"></div>Expositions</li>
            <li class="legend_item"><div class="legend_color today"></div>Aujourd'hui</li>
        </ul>

</div>

<div id="display_event">
    <div class="event_image">
        <img src="../assets/img/DSC_0028 copie bd.jpg" alt="affiche" class="poster">
    </div>
</div>

<?php include 'components/footer.php'; ?>