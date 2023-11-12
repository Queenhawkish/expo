<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}


require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';


$error = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {

    if (!ctype_digit($_GET['id'])) {
        header('Location: calendar_controller.php');
        exit;
    }
} else {

    $album_name = Album::getAlbumId($_GET['id']);

    if (is_dir("../assets/img/$album_name")) {
        $album_path = "../assets/img/$album_name";
    }

    $eventId = Album::getEventId($_GET['id']);
    if (empty($eventId)) {
        $error['event_id'] = 'Cet évènement n\'existe pas';
        exit;
    } else {
        $event = Event::getEventById($eventId);
    }


    if (isset($_FILES)) {
        foreach ($_FILES as $file => $value) {
            if (empty($value["name"])) {
                $error["event_picture"] = "Vous devez ajouter toute les photos de l'évènement";
            } else if (!str_contains($value["type"], "image")) {
                $error["event_picture"] = "Le format doit être de type image (jpg, jpeg, png)";
            } else if ($value["size"] > 1048576) {
                $error["event_picture"] = "Le fichier ne doit pas dépasser 1Mo";
            }
            if (empty($error["event_picture"])) {
                $download_picture = $album_path . "/" . $value["name"] . ".jpg";
                $picture = $value["name"] . ".jpg";
                if (move_uploaded_file($value["tmp_name"], $download_picture)) {
                    Picture::addPicture($picture, $_GET['id']);
                    if ($event["date_end"] < date("Y-m-d")) {
                        header('Location: gallery_controller.php');
                        exit;
                    } else {
                        header('Location: calendar_controller.php');
                        exit;
                    }
                }
            }
        }
    }

    include '../views/add_photos.php';
}
