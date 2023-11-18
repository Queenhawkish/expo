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

$error = [];
$showform = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $today = date('Y-m-d');
    $poster = $event["poster"];
    $folder = "../assets/img/poster/";

    $other_event = Event::getNameEventbyId($_GET["id"], $_POST["event_name"]);

    if (isset($_POST["event_name"]) && !empty($_POST["event_name"])) {
        if ($other_event) {
            $error["event_name"] = "Le nom de l'évènement exixste déjà";
        } else {
            $name = $_POST["event_name"];
        }
    } else {
        $error["event_name"] = "Veuillez renseigner le nom de l'évènement";
    }

    if (isset($_POST["event_type"]) && !empty($_POST["event_type"])) {
        $type = $_POST["event_type"];
        if ($type == 1) {
            if ($_FILES["poster"]["error"] != 4) {
                $tfile = new finfo(FILEINFO_MIME);
                if (!str_contains($tfile->file($_FILES['poster']['tmp_name']), "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if (!str_contains($_FILES["poster"]["type"], "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if ($_FILES["poster"]["size"] > 1048576) {
                    $error['event_poster'] = "L'image ne doit pas dépasser 1Mo";
                }
                if (empty($error['event_poster'])) {
                    if ($poster != "sortie.jpg" && $poster != "assemblee.jpg") {
                        $path = $folder . $poster;
                        unlink($path);
                    }
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
        if ($type == 2) {
            if ($poster != "sortie.jpg" && $poster != "assemblee.jpg") {
                $path = $folder . $poster;
                unlink($path);
            } else {
                $poster = "sortie.jpg";
            }
        }
        if ($type == 3) {
            if ($poster != "sortie.jpg" && $poster != "assemblee.jpg") {
                $path = $folder . $poster;
                unlink($path);
            } else {
                $poster = "assemblee.jpg";
            }
        }
    } else if ($_POST["event_type"] != 1 && $_POST["event_type"] != 2 && $_POST["event_type"] != 3) {
        $error['event_type'] = 'Le type de l\'évènement est incorrect';
    } else {
        $error["event_type"] = "Veuillez renseigner un type d'évènement";
    }

    if (isset($_POST["event_place"]) && !empty($_POST["event_place"])) {
        $place = $_POST["event_place"];
    } else {
        $error["event_place"] = "Veuillez renseigner un lieu";
    }

    if ((isset($_POST["event_date"]) && !empty($_POST["event_date"]))) {
        $dateStart = $_POST["event_date"];
        $dateEnd = $_POST["event_date"];
    } else {
        $dateStart = $event["date_start"];
        $dateEnd = $event["date_end"];
    }
    if (isset($_POST["event_date"]) && !empty($_POST["event_date"])) {
        $dateStart = $_POST["event_date"];
        $dateEnd = $_POST["event_date"];
    } else {
        $dateStart = $event["date_start"];
        $dateEnd = $event["date_end"];
    }

    if (!empty($_POST["event_first_date"]) && !empty($_POST["event_second_date"])) {
        $dateStart = $_POST["event_first_date"];
        $dateEnd = $_POST["event_second_date"];
    } else if (empty($_POST["event_first_date"]) || empty($_POST["event_second_date"])) {
        $error["event_expo"] = "Veuillez renseigner une date";
    } else {
        $dateStart = $event["date_start"];
        $dateEnd = $event["date_end"];
    }
    if (!empty($_POST["event_description"])) {
        $description = $_POST["event_description"];
    } else {
        $description = "";
    }

    if (empty($error)) {
        if ($_FILES["poster"]["error"] != 4) {
            if (!empty($poster)) {
                move_uploaded_file($_FILES["poster"]["tmp_name"], $folder . $poster);
            }
        }
        if (Event::updateEvent($id, $poster, $name, $type, $dateStart, $dateEnd, $place, $description)) {
            $showform = false;
        } else {
            $error['event_add'] = "L'évènement n'a pas pu être modifié";
        }
    }
}


include '../views/edit_event.php';
