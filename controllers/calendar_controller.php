<?php

// Je démarre la session
session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';
require_once '../models/type.php';
require_once '../models/participant.php';




// Je vérifie si le delete de la méthode POST est demandé
if (isset($_POST["delete"])) {
    // Je vérifie si l'album existe
    if (Album::existAlbum($_POST["event_id"])) {
        // Je récupère le nom de l'album
        $folder = Album::getAlbumByEventId($_POST["event_id"])[0]["name"];
        // Je vérifie si le dossier existe
        if (is_dir($folder)) {
            // Je récupère les images du dossier
            $images = glob('../assets/img/' . $folder . '/*');
            // Je supprime les images du dossier
            foreach ($images as $image) {
                if (is_file($image)) {
                    unlink($image);
                }
            }
            // S'il n'y a plus d'images dans le dossier, je supprime le dossier
            if (empty($images)) {
                rmdir('../assets/img/' . $folder);
            }
        // Je supprime l'événement
        Event::deleteEvent($_POST["event_id"]);
        } 
        // Si le dossier n'existe pas, je supprime l'événement
        else {
            Event::deleteEvent($_POST["event_id"]);
        }
    } 
    // Si l'album n'existe pas, je supprime l'événement
    else {
        Event::deleteEvent($_POST["event_id"]);
    }
}

$error = [];

if (isset($_POST["event_id"]) && isset($_POST["user_email"])) {
    $id_event = $_POST["event_id"];
    $participants = Participant::getParticipant($id_event);
    $objet = Event::getEventById($id_event)["event_name"];
    $message = "Vous êtes bien inscrit à l'évènement " . $objet . " !";


    if (Form::checkParticipant($participants, $_POST["user_email"])) {
        $error["user_email"] = "Vous êtes déjà inscrit à cet évènement";
    } else if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
        $error["user_email"] = "Veuillez renseigner une adresse email valide";
    }
} else {
    $error["user_email"] = "Veuillez renseigner votre adresse email";
}
if (empty($error)) {
    if (mail($_POST["user_email"], $objet, $message)) {

        $user_email = $_POST["user_email"];
        if (Participant::addParticipant($user_email, $id_event)) {
        } else {
            $error["user_email"] = "Une erreur est survenue, veuillez réessayer";
        }
    }
}

include '../views/calendar.php';
