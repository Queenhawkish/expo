<?php

// Je vérifie que l'utilisateur est bien connecté en tant qu'admin 
// sinon je le redirige vers la page d'accueil
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}

// J'inclus les fichiers nécessaires à la page 
// afin de pouvoir utiliser leurs classes, fonctions, etc...
require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/type.php';
require_once '../models/album.php';
require_once '../models/picture.php';

// Je créer un tableau $error qui contiendra les messages d'erreur
$error = [];

// Je créer une variable $showform qui me permettra d'afficher ou non le formulaire
$showform = true;

// Je vérifie que le formulaire a bien été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Je créer une variable $album_name qui contient le nom de l'album en minuscule et sans accent
    $album_name = strtolower(Form::noAccent($_POST['event_name']));


    // Je vérifie que les champs obligatoires sont remplis
    // Si un champ n'est pas remplis, j'ajoute un message d'erreur dans le tableau $error
    // Sinon je récupère la valeur du champ dans une variable

    // Je vérifie que le nom de l'évènement est bien renseigné
    if (empty($_POST['event_name'])) {
        $error['event_name'] = 'Le nom de l\'évènement est obligatoire';
    }
    // Je vérifie que le nom de l'évènement n'existe pas déjà dans la base de données 
    else if (Event::getNameEvent($_POST['event_name'])) {
        $error['event_name'] = 'Ce nom d\'évènement existe déjà';
    }
    // Je vérifie que le nom de l'évènement n'existe pas déjà dans la base de données des albums
    else if (Album::checkAlbumName($album_name)) {
        $error['event_name'] = 'Ce nom d\'évènement existe déjà';
    } else {
        $name = $_POST['event_name'];
    }
    // Je vérifie que le type de l'évènement est bien renseigné
    if (empty($_POST['event_type'])) {
        $error['event_type'] = 'Le type de l\'évènement est obligatoire';
    }
    // Je vérifie que le type de l'évènement est bien un type existant
    else if ($_POST["event_type"] != 1 && $_POST["event_type"] != 2 && $_POST["event_type"] != 3) {
        $error['event_type'] = 'Le type de l\'évènement est incorrect';
    } else {
        $type = $_POST['event_type'];
    }
    // Je vérifie que le lieu de l'évènement est bien renseigné
    if (empty($_POST['event_place'])) {
        $error['event_place'] = 'Le lieu de l\'évènement est obligatoire';
    } else {
        $place = $_POST['event_place'];
    }
    // Je vérifie que la date de l'évènement est bien renseigné
    if (empty($_POST['event_date'])) {
        // Si la date de l'évènement n'est pas renseigné, je vérifie que les 2 dates d'une exposition sont bien renseigné
        if (empty($_POST['event_first_date']) && empty($_POST['event_second_date'])) {
            $error['event_date'] = 'La date de l\'évènement est obligatoire';
            $error['event_expo'] = 'Les 2 dates de l\'évènement sont obligatoires pour une exposition';
        }
        // Si les 2 dates d'une exposition sont bien renseigné, je vérifie que la première date est bien antérieur à la seconde
        else if ($_POST['event_first_date'] > $_POST['event_second_date']) {
            $error['event_expo'] = 'La première date doit être antérieur à la seconde';
        }
        // Si les 2 dates d'une exposition sont correctement renseigné je récupère les valeurs des dates
        else {
            $first_date = $_POST['event_first_date'];
            $second_date = $_POST['event_second_date'];
        }
    }
    // Si la date de l'évènement est bien renseigné, je récupère la valeur de la date
    else {
        $first_date = $_POST['event_date'];
        $second_date = $_POST['event_date'];
    }

    // Je vérifie que l'affiche de l'évènement est bien renseigné
    if (isset($_POST["event_type"])) {
        // Si l'évènement est une exposition, je vérifie que l'affiche est bien renseigné
        if ($_POST['event_type'] == 1) {
            // Si l'affiche n'est pas renseigné, j'ajoute un message d'erreur dans le tableau $error
            if ($_FILES["poster"]["error"] == 4) {
                $error['event_poster'] = 'L\'affiche de l\'évènement est obligatoire';
            }

            if (empty($error['event_poster'])) {
                //  J'instancie la classe finfo afin de vérifier le type de l'affiche
                $tfile = new finfo(FILEINFO_MIME);
                // Je vérifie que l'affiche est bien une image
                if (!str_contains($tfile->file($_FILES['poster']['tmp_name']), "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                } else if (!str_contains($_FILES["poster"]["type"], "image")) {
                    $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                }
                // Je vérifie que l'affiche ne dépasse pas 1Mo
                else if ($_FILES["poster"]["size"] > 1048576) {
                    $error['event_poster'] = "Le justificatif ne doit pas dépasser 1Mo";
                }
                if (empty($error['event_poster'])) {
                    // Je créer une variable $poster qui contient le nom de l'affiche + le nom de l'évènement en minuscule et sans accent
                    $poster = $_FILES["poster"]["name"] . '.' . strtolower(Form::noAccent($_POST['event_name']));
                    // Si l'image est au format jpg, je supprime l'extension et je la remplace par .jpg afin que le nom de l'image se termine bien par .jpg
                    if (str_contains($_FILES["poster"]["name"], '.jpg')) {
                        $poster = str_replace('.jpg', '', $poster);
                        $poster = $poster . ".jpg";
                    } 
                    // Si l'image est au format png, je supprime l'extension et je la remplace par .png afin que le nom de l'image se termine bien par .png
                    else if (str_contains($_FILES["poster"]["name"], '.png')) {
                        $poster = str_replace('.png', '', $poster);
                        $poster = $poster . ".png";
                    } 
                    // Si l'image est au format jpeg, je supprime l'extension et je la remplace par .jpeg afin que le nom de l'image se termine bien par .jpeg
                    else if (str_contains($_FILES["poster"]["name"], '.jpeg')) {
                        $poster = str_replace('.jpeg', '', $poster);
                        $poster = $poster . ".jpeg";
                    } 
                    // Si l'image n'est pas au format jpg, png ou jpeg, j'ajoute un message d'erreur dans le tableau $error
                    else {
                        $error['event_poster'] = "Le format doit être de type image (jpg, jpeg, png)";
                    }
                }
            }
        }
        // Si l'évènement est une sortie, j'ajoute l'affiche correspondante
        if ($_POST['event_type'] == 2) {
            $poster = "sortie.jpg";
        }
        // Si l'évènement est une assemblée générale, j'ajoute l'affiche correspondante
        if ($_POST['event_type'] == 3) {
            $poster = "assemblee.jpg";
        }
    }
    // Si la description de l'évènement est bien renseigné, je récupère la valeur de la description
    if (isset($_POST['event_description'])) {
        $description = $_POST['event_description'];
    } 
    // Si la description de l'évènement n'est pas renseigné, n'étant pas obligatoire, je lui attribue une valeur vide
    else {
        $description = '';
    }
    // Je vérifie que tout les champs obligatoires sont bien remplis
    if (isset($_POST['event_name']) && isset($_POST['event_type']) && isset($_POST['event_place']) && (isset($_POST['event_date']) || (isset($_POST['event_first_date']) && isset($_POST['event_second_date'])))) {

        // Je vérifie que le tableau d'erreur est vide
        if (empty($error)) {
            // J'ajoute l'évènement dans la base de données
            if (Event::addEvent($poster, $name, $type, $first_date, $second_date, $place, $description)) {
                // Je récupère l'id de l'évènement que je viens d'ajouter
                $id = Event::getIdEvent($name);
                // Je télécharge l'affiche de l'évènement dans le dossier assets/img/poster
                if (isset($_FILES['poster'])) {
                    $uploadPicture = "../assets/img/poster/" . $poster;
                    move_uploaded_file($_FILES['poster']['tmp_name'], $uploadPicture);
                }
                // Je change la valeur de ma variable $showform afin de ne plus afficher le formulaire 
                // mais un message de confirmation ainsi qu'un bouton de redirection ou un bouton lui donnant 
                // la possibilité d'ajouter des photos à l'évènement
                $showform = false;
            } else {
                // Si l'évènement n'a pas pu être ajouté, j'ajoute un message d'erreur dans le tableau $error
                $error['event_add'] = 'L\'évènement n\'a pas pu être ajouté';
            }
        }
    }
}


// J'inclus ma vue
include '../views/add_event.php';
