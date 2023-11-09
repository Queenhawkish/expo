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

$error = [];

$today = date('Y-m-d\TH:i');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['event_name'])) {
        $error['event_name'] = 'Le nom de l\'évènement est obligatoire';
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
            if (isset($_FILES['poster'])) {
                $tfile = new finfo(FILEINFO_MIME);
                if (!str_contains($tfile->file($_FILES['poster']['tmp_name']), "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if (!str_contains($_FILES["poster"]["type"], "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if ($_FILES["poster"]["size"] > 1048576) {
                    $error['event_poster'] = "Le justificatif ne doit pas dépasser 1Mo";
                }
                if (empty($error)) {
                    $picture = $_FILES['poster']['tmp_name'];
                    $poster = $_FILES['poster']['name'];
                }
            } else {
                $error['event_poster'] = 'L\'affiche de l\'évènement est obligatoire';
            }
        }
        if ($_POST['event_type'] == 2) {
            $poster = "Front/sortie.jpg";
        }
        if ($_POST['event_type'] == 3) {
            $poster = "Front/assemblee.jpg";
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
            if ($second_date > $today) {
                $classify = false;
            } else {
                $error['event_date'] = 'La date de l\'évènement ne peut pas être antérieure à aujourd\'hui pour un évènement autre qu\'une exposition';
            }
        }
        if (!empty($_POST['event_first_date']) && !empty($_POST['event_second_date'])) {
            $first_date = $_POST['event_first_date'];
            $second_date = $_POST['event_second_date'];
            if ($_POST['event_second_date'] < $today) {
                if ($type == 1) {
                    $classify = true;
                } else {
                    $classify = false;
                }
            } else {
                $classify = false;
            }
        }



        if (Event::addEvent($poster, $name, $type, $first_date, $second_date, $place, $description, $classify)) {
            $foldername = strtolower(Form::noAccent($_POST['event_name']));
            $folder = "../assets/img/$foldername";
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            if (isset($_FILES['poster'])) {
                $testUpload = $folder . '/' . $_FILES['poster']['name'] . $foldername . '.jpg';
                move_uploaded_file($_FILES['poster']['tmp_name'], $testUpload);
            }
            if ($type == 1) {
                header('Location: add_photos_controller.php');
                exit;
            } else {
            header('Location: calendar_controller.php');
            exit;
            }
            exit;
        } else {
            $error['event_add'] = 'L\'évènement n\'a pas pu être ajouté';
        }
    }
}



include '../views/add_event.php';
