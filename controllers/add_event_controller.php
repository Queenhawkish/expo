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
require_once '../models/type.php';
require_once '../models/album.php';
require_once '../models/picture.php';

$error = [];

$today = date('Y-m-d');

$showform = true;
$expo = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $album_name = strtolower(Form::noAccent($_POST['event_name']));


    if (empty($_POST['event_name'])) {
        $error['event_name'] = 'Le nom de l\'évènement est obligatoire';
    } else if (Event::getNameEvent($_POST['event_name'])) {
        $error['event_name'] = 'Ce nom d\'évènement existe déjà';
    } else if (Album::checkAlbumName($album_name)) {
        $error['event_name'] = 'Ce nom d\'évènement existe déjà';
    }
    if (empty($_POST['event_type'])) {
        $error['event_type'] = 'Le type de l\'évènement est obligatoire';
    }
    if (empty($_POST['event_place'])) {
        $error['event_place'] = 'Le lieu de l\'évènement est obligatoire';
    }
    if (empty($_POST['event_date'])) {
        if (empty($_POST['event_first_date']) && empty($_POST['event_second_date'])) {
            $error['event_date'] = 'La date de l\'évènement est obligatoire';
            $error['event_expo'] = 'Les 2 dates de l\'évènement sont obligatoires pour une exposition';
        }
    }

    if (isset($_POST["event_type"])) {
        if ($_POST['event_type'] == 1) {

            if ($_FILES["poster"]["error"] == 4) {
                $error['event_poster'] = 'L\'affiche de l\'évènement est obligatoire';
            }

            if (empty($error['event_poster'])) {
                $tfile = new finfo(FILEINFO_MIME);
                if (!str_contains($tfile->file($_FILES['poster']['tmp_name']), "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if (!str_contains($_FILES["poster"]["type"], "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if ($_FILES["poster"]["size"] > 1048576) {
                    $error['event_poster'] = "Le justificatif ne doit pas dépasser 1Mo";
                }
                if (empty($error['event_poster'])) {
                    if (str_contains($_FILES["poster"]["name"], '.jpg')) {
                        $poster = $_FILES["poster"]["name"] . '.' . strtolower(Form::noAccent($_POST['event_name']));
                        $poster = str_replace('.jpg', '', $poster);
                        $poster = $poster . ".jpg";
                    } else if (str_contains($_FILES["poster"]["name"], '.png')) {
                        $poster = $_FILES["poster"]["name"] . '.' . strtolower(Form::noAccent($_POST['event_name']));
                        $poster = str_replace('.png', '', $poster);
                        $poster = $poster . ".png";
                    } else if (str_contains($_FILES["poster"]["name"], '.jpeg')) {
                        $poster = $_FILES["poster"]["name"] . '.' . strtolower(Form::noAccent($_POST['event_name']));
                        $poster = str_replace('.jpeg', '', $poster);
                        $poster = $poster . ".jpeg";
                    } else {
                        $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                    }
                    $picture = $_FILES['poster']['tmp_name'];
                    $poster = $_FILES['poster']['name'] . '.' . strtolower(Form::noAccent($_POST['event_name']));
                }
            }
        }
        if ($_POST['event_type'] == 2) {
            $poster = "sortie.jpg";
        }
        if ($_POST['event_type'] == 3) {
            $poster = "assemblee.jpg";
        }
    } else {
        $error['event_poster'] = 'L\'affiche de l\'évènement est obligatoire';
    }
    if (isset($_POST['event_name']) && isset($_POST['event_type']) && isset($_POST['event_place']) && (isset($_POST['event_date']) || (isset($_POST['event_first_date']) && isset($_POST['event_second_date'])))) {
        $name = $_POST['event_name'];
        $type = $_POST['event_type'];
        $place = $_POST['event_place'];
        if (isset($_POST['event_description'])) {
            $description = $_POST['event_description'];
        } else {
            $description = '';
        }
        if (!empty($_POST['event_date'])) {
            $first_date = $_POST['event_date'];
            $second_date = $_POST['event_date'];
        }
        if (!empty($_POST['event_first_date']) && !empty($_POST['event_second_date'])) {
            $first_date = $_POST['event_first_date'];
            $second_date = $_POST['event_second_date'];
        }






        if (empty($error)) {
            $poster = str_replace('.jpg', '', $poster);

            $poster = $poster . ".jpg";
            if (Event::addEvent($poster, $name, $type, $first_date, $second_date, $place, $description)) {
                $id = Event::getIdEvent($name);
                if ($type == 1) {
                    if (isset($_FILES['poster'])) {
                        $uploadPicture = "../assets/img/poster/" . $poster;
                        move_uploaded_file($_FILES['poster']['tmp_name'], $uploadPicture);
                    }
                    $showform = false;
                    $expo = true;
                } else {
                    $showform = false;
                }
            } else {
                $error['event_add'] = 'L\'évènement n\'a pas pu être ajouté';
            }
        }
    }
}



include '../views/add_event.php';
