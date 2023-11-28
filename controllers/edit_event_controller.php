<?php
// Vérification de l'existance d'une session
session_start();
// Si la session n'existe pas on redirige vers la page d'accueil
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}

// Inclusion des fichiers de configuration et des différents modèles
require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/type.php';
require_once '../models/album.php';
require_once '../models/picture.php';



// Vérification de l'id de l'évènement
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Vérification que l'id est bien un nombre sinon redirection vers la page d'accueil
    if (!ctype_digit($_GET["id"])) {
        header('Location: ../index.php');
        exit;
    } else {
        // Création d'une variable pour stocker l'id de l'évènement
        $id = strip_tags($_GET["id"]);
        // Appel de la méthode getEventById pour récupérer l'évènement
        $event = Event::getEventById($id);
        // Vérification que l'évènement existe sinon redirection vers la page d'accueil
        if ($event === false) {
            header('Location: ../index.php');
            exit;
        }
    }
} 
// Si l'id n'est pas renseigné dans l'url redirection vers la page d'accueil
else {
    header('Location: ../index.php');
    exit;
}

// Création d'un tableau d'erreur
$error = [];
// Création d'une variable pour afficher le formulaire
$showform = true;
// Vérification de la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Création d'une variable pour stocker le nom de l'image
    $poster = $event["poster"];
    // Création d'une variable pour stocker le chemin du dossier
    $folder = "../assets/img/poster/";
    // Création d'une variable pour stocker le nom de l'évènement afin de vérifier si il existe déjà
    $other_event = Event::getNameEventbyId($_GET["id"], $_POST["event_name"]);
    // Vérification que le nom de l'évènement est renseigné et qu'il n'existe pas déjà 
    // sinon récupération du nom de l'évènement
    if (isset($_POST["event_name"]) && !empty($_POST["event_name"])) {
        if ($other_event) {
            $error["event_name"] = "Le nom de l'évènement exixste déjà";
        } else {
            $name = $_POST["event_name"];
        }
    } else {
        $error["event_name"] = "Veuillez renseigner le nom de l'évènement";
    }
    
    // Vérification que le type de l'évènement est renseigné et qu'il existe
    if (isset($_POST["event_type"]) && !empty($_POST["event_type"])) {
        $type = $_POST["event_type"];
        // Si le type est une exposition
        if ($type == 1) {
            // Vérification que le poster est renseigné
            if ($_FILES["poster"]["error"] != 4) {
                // Création d'une variable pour stocker le type de fichier
                $tfile = new finfo(FILEINFO_MIME);
                // Vérification que le fichier est bien une image
                if (!str_contains($tfile->file($_FILES['poster']['tmp_name']), "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if (!str_contains($_FILES["poster"]["type"], "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } 
                // Vérification que le fichier ne dépasse pas 1Mo
                else if ($_FILES["poster"]["size"] > 1048576) {
                    $error['event_poster'] = "L'image ne doit pas dépasser 1Mo";
                }
                if (empty($error['event_poster'])) {
                    // Si le poster est différent de sortie.jpg et assemblee.jpg on supprime l'ancien poster
                    if ($poster != "sortie.jpg" && $poster != "assemblee.jpg") {
                        $path = $folder . $poster;
                        unlink($path);
                    }
                    // Si le fichier est de type jpg, jpeg ou png on le renomme
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
                    } 
                    // Sinon on affiche un message d'erreur
                    else {
                        $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                    }
                    $picture = $_FILES['poster']['tmp_name'];
                    $poster = $_FILES['poster']['name'] . '.' . strtolower(Form::noAccent($_POST['event_name']));
                }
            } 
            // Si le poster n'est pas renseigné on récupère l'ancien poster
            else {
                $poster = $event["poster"];
            }
        }
        // Si le type est une sortie
        if ($type == 2) {
            // Si le poster est différent de sortie.jpg et assemblee.jpg on supprime l'ancien poster
            // et on récupère le poster prévu pour les sorties
            if ($poster != "sortie.jpg" && $poster != "assemblee.jpg") {
                $path = $folder . $poster;
                unlink($path);
                $poster = "sortie.jpg";
            } 
            // Sinon on récupère le poster prévu pour les sorties
            else {
                $poster = "sortie.jpg";
            }
        }
        // Si le type est une assemblée
        if ($type == 3) {
            // Si le poster est différent de sortie.jpg et assemblee.jpg on supprime l'ancien poster
            // et on récupère le poster prévu pour les assemblées
            if ($poster != "sortie.jpg" && $poster != "assemblee.jpg") {
                $path = $folder . $poster;
                unlink($path);
            } 
            // Sinon on récupère le poster prévu pour les assemblées
            else {
                $poster = "assemblee.jpg";
            }
        }
    } 

    // On vérifie que le type de l'événement renseigné est correct
    else if ($_POST["event_type"] != 1 && $_POST["event_type"] != 2 && $_POST["event_type"] != 3) {
        $error['event_type'] = 'Le type de l\'évènement est incorrect';
    } 
    // Sinon on envoie un message d'erreur
    else {
        $error["event_type"] = "Veuillez renseigner un type d'évènement";
    }

    // Vérification que le lieu de l'évènement est renseigné
    if (isset($_POST["event_place"]) && !empty($_POST["event_place"])) {
        $place = $_POST["event_place"];
    } 
    // Sinon on envoie un message d'erreur
    else {
        $error["event_place"] = "Veuillez renseigner un lieu";
    }
    // Vérification que la date de l'évènement est renseignée
    if ((isset($_POST["event_date"]) && !empty($_POST["event_date"]))) {
        $dateStart = $_POST["event_date"];
        $dateEnd = $_POST["event_date"];
    } 
    // Sinon on envoie un message d'erreur
    else {
        $error["event_date"] = "Veuillez renseigner une date";
    }
    
    // Vérification que les dates de l'évènement sont renseignées
    if (!empty($_POST["event_first_date"]) && !empty($_POST["event_second_date"])) {
        // Vérification que la date de début est inférieure à la date de fin
        if ($_POST["event_first_date"] > $_POST["event_second_date"]) {
            $error["event_expo"] = "La date de début doit être inférieure à la date de fin";
        } else {
            $dateStart = $_POST["event_first_date"];
            $dateEnd = $_POST["event_second_date"];
        }
    } 
    // Sinon on envoie un message d'erreur
    else if (empty($_POST["event_first_date"]) || empty($_POST["event_second_date"])) {
        $error["event_expo"] = "Veuillez renseigner une date";
    } else {
        $dateStart = $event["date_start"];
        $dateEnd = $event["date_end"];
    }
    // Vérification que la description de l'évènement est renseignée
    if (!empty($_POST["event_description"])) {
        $description = $_POST["event_description"];
    } 

    // Sinon on récupère une vide puisque la description est facultative
    else {
        $description = "";
    }
    // Vérification qu'il n'y a pas d'erreur
    if (empty($error)) {
        // Vérification que le poster est renseigné
        if ($_FILES["poster"]["error"] != 4) {
            if (!empty($poster)) {
            // Si le poster est renseigner , on le télécharge dans le dossier assets/img/poster
                move_uploaded_file($_FILES["poster"]["tmp_name"], $folder . $poster);
            }
        }
        // Si la méthode updateEvent renvoie true on affiche un message de succès
        if (Event::updateEvent($id, $poster, $name, $type, $dateStart, $dateEnd, $place, $description)) {
            $showform = false;
        } 
        // Sinon on affiche un message d'erreur
        else {
            $error['event_add'] = "L'évènement n'a pas pu être modifié";
        }
    }
}

// On inclut la vue
include '../views/edit_event.php';
