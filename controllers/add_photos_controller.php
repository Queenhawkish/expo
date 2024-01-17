<?php

// Je démarre la session
session_start();
// Si la session administrateur n'existe pas je redirige vers la page d'accueil
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}


require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
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


// Je créer un nom d'album en fonction du nom de l'évènement
$album_name = strtolower(Form::noAccent($event['event_name']));
// Je vérifie que la méthode POST existe et que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Je vérifie que le champ picture existe et n'est pas vide
    if (isset($_POST["id_picture"])) {
        // Je supprime la photo de l'album
        Picture::deletePicture($_POST["id_picture"]);
    } 
    // Je vérifie que le l'input files existe et n'est pas vide
    else if (!empty($_FILES) && $_FILES["picture"]["error"] != 4) {
        // J'utilise la classe finfo pour récupérer le type MIME du fichier
        $tfile = new finfo(FILEINFO_MIME);
        // Je vérifie que le fichier est bien une image
        if (!str_contains($tfile->file($_FILES['picture']['tmp_name']), "image")) {
            $error['picture'] = "Le format doit être de type image (jpg, jpeg, png)";
        } else if (!str_contains($_FILES["picture"]["type"], "image")) {
            $error['picture'] = "Le format doit être de type image (jpg, jpeg, png)";
        } 
        // Je vérifie que le fichier ne dépasse pas 1Mo
        else if ($_FILES["picture"]["size"] > 1048576) {
            $error['picture'] = "Le justificatif ne doit pas dépasser 1Mo";
        }
        // Je vérifie qu'il n'y a pas d'erreur
        if (empty($error['picture'])) {
            // Si le fichier possède une extension jpg, jpeg ou png je supprime le nom de l'extension 
            // pour ajouter le nom de l'album et remettre le nom de l'extension à la fin afin d'obtenir un nom unique
            // de type : nom_photo.nom_album.jpg
            if (str_contains($_FILES["picture"]["name"], '.jpg')) {
                $picture = $_FILES['picture']['name'] . '.' . $album_name;
                $picture = str_replace('.jpg', '', $picture);
                $picture = $picture . ".jpg";
            } else if (str_contains($_FILES["picture"]["name"], '.png')) {
                $picture = $_FILES['picture']['name'] . '.' . $album_name;
                $picture = str_replace('.png', '', $picture);
                $picture = $picture . ".png";
            } else if (str_contains($_FILES["picture"]["name"], '.jpeg')) {
                $picture = $_FILES['picture']['name'] . '.' . $album_name;
                $picture = str_replace('.jpeg', '', $picture);
                $picture = $picture . ".jpeg";
            } else {
                $error['event_picture'] = "Le format doit être de type image (jpg, jpeg, png)";
            }
            // Je vérifie que l'album existe
            if (Album::existAlbum($id)) {
                // Je vérifie que le dossier existe
                if (is_dir('../assets/img/' . $album_name)) {
                    // Je récupère l'id de l'album grâce à son nom
                    $id_album = Album::getIdAlbum($album_name);
                    // J'ajoute la photo à l'album
                    if (Picture::addPicture($picture, $id_album)) {
                        // Je télécharge la photo dans le dossier de l'album
                        $picture_path = '../assets/img/' . $album_name . '/' . $picture;
                        if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
                            // Si le téléchargement est réussi j'affiche un message de succès
                            $success = "La photo a bien été ajoutée à l'exposition";
                        }
                    }
                }
            } 
            // Si l'album n'existe pas je le crée
            else {
                if (Album::addAlbum($album_name, $id)) {
                    // Je crée le dossier de l'album
                    mkdir('../assets/img/' . $album_name, 0777, true);
                    // Si le dossier est bien créé, je récupère l'id de l'album
                    if (is_dir('../assets/img/' . $album_name)) {
                        $id_album = Album::getIdAlbum($album_name);
                        // J'ajoute la photo à l'album
                        if (Picture::addPicture($picture, $id_album)) {
                            // Je télécharge la photo dans le dossier de l'album
                            $picture_path = '../assets/img/' . $album_name . '/' . $picture;
                            if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
                                // Si le téléchargement est réussi j'affiche un message de succès
                                $success = "La photo a bien été ajoutée à l'exposition";
                            }
                        }
                    }
                }
            }
        }
    } else {
        $error['picture'] = 'L\'affiche de l\'évènement est obligatoire';
    }
}

// J'inclus la vue
include '../views/add_photos.php';
