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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $other_event = Event::getNameEvent($_POST["event_name"]);

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
    } 
    if (!empty($_POST["event_date"])) {
        if (isset($_POST["event_first_date"]) && !empty($_POST["event_first_date"])) {
            $dateStart = $_POST["event_first_date"];
        }
        if (isset($_POST["event_second_date"]) && !empty($_POST["event_second_date"])) {
            $dateEnd = $_POST["event_second_date"];
        }
        if (!empty($_POST["event_first_date"])) {
            $error["event_expo"] = "Veuillez renseigner une date de début";
        }
        if (!empty($_POST["event_second_date"])) {
            $error["event_expo"] = "Veuillez renseigner une date de fin";
        } else {
            $error["event_date"] = "Veuillez renseigner une date";
        }
    }
}


include '../views/edit_event.php';
