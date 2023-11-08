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
    if (!isset($_POST['event_type'])) {
        $error['event_type'] = 'Le type de l\'évènement est obligatoire';
    }
    if (empty($_POST['event_place'])) {
        $error['event_place'] = 'Le lieu de l\'évènement est obligatoire';
    }
    if (empty($_POST['event_sortie']) || (empty($_POST['event_first_date']) && empty($_POST['event_second_date']))) {
        $error['event_date'] = 'La date de l\'évènement est obligatoire';
    }
    if (!isset($_FILES['poster'])) {
        $error['event_poster'] = 'L\'affiche de l\'évènement est obligatoire';
    }
    if (isset($_POST['event_name']) && isset($_POST['event_type']) && isset($_POST['event_place']) && (isset($_POST['event_sortie']) || isset($_POST['event_first_date']) && isset($_POST['event_second_date']))) {
        $name = $_POST['event_name'];
        $type = $_POST['event_type'];
        $place = $_POST['event_place'];
        if (isset($_POST['event_description'])) {
            $description = $_POST['event_description'];
        } else {
            $description = '';
        }
        if (isset($_POST['event_sortie'])) {
            $first_date = $_POST['event_sortie'];
            $second_date = $_POST['event_sortie'];
            if ($_POST['event_sortie'] < $today) {
                $classify = true;
            } else {
                $classify = false;
            }
        } else {
            $first_date = $_POST['event_first_date'];
            $second_date = $_POST['event_second_date'];
            if ($_POST['event_first_date'] < $today) {
                if ($type == 1){
                $classify = true;
                } else {
                    $error['event_date'] = 'La date de l\'évènement ne peut pas être antérieure à aujourd\'hui pour un évènement autre qu\'une exposition';
                }
            } else {
                $classify = false;
            }
        }
        $exposition = false;
        if ($type == 1) {
            $exposition = true;
            if (isset($_FILES['poster'])) {
                $poster = $_FILES['poster'];
            }
        }
        if ($type == 2) {
            $poster = "Front/sortie.jpg";
        }
        if ($type == 3) {
            $poster = "Front/assemblee.jpg";
        }
        if (event::addEvent($poster, $name, $type, $first_date, $second_date, $place, $description, $classify)) {
            header('Location: add_photos_controller.php');
            exit;
        }
    }
}
$exposition = false;



include '../views/add_event.php';
