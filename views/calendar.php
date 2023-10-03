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
            <td id="<?= $name_month["Janvier"]?>" <?php if ($day == $today && $name_month["Janvier"] == $this_month){ ?> class= "today" <?php } ?>><?= $day ?></td>

            <?php if ($day < 29){ ?>
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

    <div class="legend">
        <div class="legend_item">
            <div class="legend_color"></div>
            <div class="legend_text">Event 1</div>
        </div>
        <div class="legend_item">
            <div class="legend_color"></div>
            <div class="legend_text">Event 2</div>
        </div>
        <div class="legend_item">
            <div class="legend_color"></div>
            <div class="legend_text">Event 3</div>
        </div>
    </div>

</div>

<?php include 'components/footer.php'; ?>