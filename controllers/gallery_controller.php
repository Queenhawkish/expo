<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';



if (isset($_POST["delete"])) {
    if (Album::existAlbum($_POST["event_id"])) {
        $folder = Album::getAlbumByEventId($_POST["event_id"])[0]["name"];
        if (is_dir($folder)) {
            $images = glob('../assets/img/' . $folder . '/*');
            var_dump($images);
            foreach ($images as $image) {
                if (is_file($image)) {
                    unlink($image);
                }
            }
            if (empty($images)) {
                rmdir('../assets/img/' . $folder);
            }
        Event::deleteEvent($_POST["event_id"]);
        } else {
            Event::deleteEvent($_POST["event_id"]);
        }
    } else {
        Event::deleteEvent($_POST["event_id"]);
    }
}


$add_album = "Ajoutez des photos pour que l'évènements s'affiche dans la galerie , sinon supprimer l'évènement";




include '../views/gallery.php';
