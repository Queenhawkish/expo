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
        <?php foreach(Event::getOldEvents($thisyear) as $events => $event) {?>
        <div class="gallery_events">
            <h4><?= $event["event_name"]?></h4>
            <a href="event_controller.php?id=<?= $event["event_id"] ?>">
                <img src="../assets/img/poster/<?= $event["poster"] ?>" alt="<?= $event["poster"]?>" class="new_poster">
            </a>
            <div class="gallery_event_infos">
                <ul>
                    <li><?= Form::getEventDate($event) ?></li>
                    <li>À <?= $event["place"] ?></li>
                </ul>
                <p class="event_description"><?= $event["description"] ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php include 'components/footer.php'; ?>