<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';
require_once '../models/type.php';


// Je vérifie qu'il y a bien un id dans l'url
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Je vérifie que l'id est bien un nombre sinon je redirige vers la page d'accueil
    if (!ctype_digit($_GET["id"])) {
        header('Location: ../index.php');
        exit;
    } 
    
    else {
        // Je récupère l'id dans une variable
        $id = strip_tags($_GET["id"]);
        // Je récupère l'évènement correspondant à l'id
        $event = Event::getEventById($id);
        // Je vérifie que l'id correspond bien à un évènement existant sinon je redirige vers la page d'accueil
        if ($event === false) {
            header('Location: ../index.php');
            exit;
        }
    }
} 
// je redirige vers la page d'accueil si l'id n'est pas renseigné dans l'url
else {
    header('Location: ../index.php');
    exit;
}

$error = [];
$rotate = array(
    "first" => 0,
    "second" => 1,
    "third" => 2,
    "fourth" => 3,
    "zero" => 4
);


include '../views/event.php';
