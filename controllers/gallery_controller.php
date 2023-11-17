<?php

session_start();

var_dump($_SESSION);
var_dump($_POST);

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';



if (isset($_POST["delete"])) {
    if (Album::existAlbum($_POST["event_id"])) {
        // $folder = Album::getAlbumByEventId($_POST["event_id"])["name"];
        // $images = glob('../assets/img/' . $folder . '/*');
        var_dump("coucou");
        // var_dump($images);
        // foreach ($images as $image) {
        //     if (is_file($image)) {
        //         unlink($image);
        //     }
        // }
        // rmdir('../assets/img/gallery/' . $folder);
    } else {
        var_dump("perdu");
    }
}


$add_album = "Ajoutez des photos pour que l'évènements s'affiche dans la galerie , sinon supprimer l'évènement";




include '../views/gallery.php';
