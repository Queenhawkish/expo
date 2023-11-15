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

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    if (!ctype_digit($_GET["id"])) {
        header('Location: ../index.php');
        exit;
    } else {
        $id = strip_tags($_GET["id"]);
        $event = Event::getEventById($id);
        if ($event === false) {
            header('Location: ../index.php');
            exit;
        }
    }
} else {
    header('Location: ../index.php');
    exit;
}


$album_name = strtolower(Form::noAccent($event['event_name']));
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST["id_picture"])) {
        Picture::deletePicture($_POST["id_picture"]);
    } else if (!empty($_FILES) && $_FILES["picture"]["error"] != 4) {
        $tfile = new finfo(FILEINFO_MIME);
        if (!str_contains($tfile->file($_FILES['picture']['tmp_name']), "image")) {
            $error['picture'] = "Le format doit être de type image (jpg, jpeg, png)";
        } else if (!str_contains($_FILES["picture"]["type"], "image")) {
            $error['picture'] = "Le format doit être de type image (jpg, jpeg, png)";
        } else if ($_FILES["picture"]["size"] > 1048576) {
            $error['picture'] = "Le justificatif ne doit pas dépasser 1Mo";
        }
        if (empty($error['picture'])) {
            if (str_contains($_FILES["picture"]["name"], '.jpg')) {
                $picture = $_FILES["picture"]["name"] . '.' . strtolower(Form::noAccent($event["event_name"]));
                $picture = str_replace('.jpg', '', $picture);
                $picture = $_FILES['picture']['name'] . '.' . $album_name;
                $picture = $picture . ".jpg";
            } else if (str_contains($_FILES["picture"]["name"], '.png')) {
                $picture = $_FILES["picture"]["name"] . '.' . strtolower(Form::noAccent($event["event_name"]));
                $picture = str_replace('.png', '', $picture);
                $picture = $_FILES['picture']['name'] . '.' . $album_name;
                $picture = $picture . ".png";
            } else if (str_contains($_FILES["picture"]["name"], '.jpeg')) {
                $picture = $_FILES["picture"]["name"] . '.' . strtolower(Form::noAccent($event["event_name"]));
                $picture = str_replace('.jpeg', '', $picture);
                $picture = $_FILES['picture']['name'] . '.' . $album_name;
                $picture = $picture . ".jpeg";
            } else {
                $error['event_picture'] = "Le format doit être de type image (jpg, jpeg, png)";
            }
            $picture = $_FILES['picture']['name'];
            if (Album::existAlbum($album_name, $id)) {
                if (is_dir('../assets/img/' . $album_name)) {
                    $id_album = Album::getIdAlbum($album_name);
                    if (Picture::addPicture($picture, $id_album)) {
                        $picture_path = '../assets/img/' . $album_name . '/' . $picture;
                        if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
                            $success = "La photo a bien été ajoutée à l'exposition";
                        }
                    }
                }
            } else {
                if (Album::addAlbum($album_name, $id)) {
                    mkdir('../assets/img/' . $album_name, 0777, true);
                    if (is_dir('../assets/img/' . $album_name)) {
                        $id_album = Album::getIdAlbum($album_name);
                        if (Picture::addPicture($picture, $id_album)) {
                            $picture_path = '../assets/img/' . $album_name . '/' . $picture;
                            if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
                                $success = "La photo a bien été ajoutée à l'exposition";
                            }
                        }
                    }
                }
            }
        }
    } else {
        $error['picture'] = 'L\'affiche de l\'évènement est obligatoire';
    }
}

include '../views/add_photos.php';
