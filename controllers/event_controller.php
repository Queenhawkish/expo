<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';
require_once '../models/type.php';


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

if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    Event::deleteEvent($_GET["id"]);
}

$error = [];


include '../views/event.php';