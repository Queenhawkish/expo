<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';
require_once '../models/type.php';
require_once '../models/participant.php';




if (isset($_POST["delete"])) {
    if (Album::existAlbum($_POST["event_id"])) {
        Event::deleteEvent($_POST["event_id"]);
        $folder = Album::getAlbumByEventId($_POST["event_id"])[0]["name"];
        if (is_dir($folder)) {
            $images = glob('../assets/img/' . $folder . '/*');
            var_dump($images);
            foreach ($images as $image) {
                if (is_file($image)) {
                    unlink($image);
                }
            }
            if (empty($images)) {
                rmdir('../assets/img/' . $folder);
            }
        } else {
            Event::deleteEvent($_POST["event_id"]);
        }
    } else {
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
