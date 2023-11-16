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




if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    Event::deleteEvent($_GET["id"]);
}

$showform = false;
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_event = $_POST["event_id"];
    $participants = Participant::getParticipant($id_event);
    $objet = Event::getEventById($id_event)["name"];
    $message = "Vous êtes bien inscrit à l'évènement " . $objet . " !";

    function checkParticipant($participants, $email)
    {
        foreach ($participants as $participant) {
            if ($email == $participant["email"]) {
                return true;
            }
        }
        return false;
    }

    if (!isset($_POST["user_email"]) || empty($_POST["user_email"])) {
        $error["user_email"] = "Veuillez renseigner votre adresse email";
    } else if (checkParticipant($participants, $_POST["user_email"])) {
        $error["user_email"] = "Vous êtes déjà inscrit à cet évènement";
    } else if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
        $error["user_email"] = "Veuillez renseigner une adresse email valide";
    }
    if (empty($error)) {
        if (mail($_POST["user_email"], $objet, $message)) {
            $error["user_email"] = "Un email de confirmation vous a été envoyé à l'adresse suivante : <br> " . $_POST['user_email'];

            $user_email = $_POST["user_email"];
            if (Participant::addParticipant($user_email, $id_event)) {
                $showform = true;
            } else {
                $showform = false;
                $error["user_email"] = "Une erreur est survenue, veuillez réessayer";
            }
        }
    }
}

include '../views/calendar.php';
