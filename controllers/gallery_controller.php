<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';



if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    Event::deleteEvent($_GET["id"]);
    if (Album::existAlbum($_GET["id"])) {
        $folder = Album::getAlbumByEventId($_GET["id"])["name"];
        $images = glob('../assets/img/' . $folder . '/*');
        foreach ($images as $image) {
            if (is_file($image)) {
                unlink($image);
            }
        }
        rmdir('../assets/img/gallery/' . $folder);
    }
}

$today = date('Y-m-d');




include '../views/gallery.php';