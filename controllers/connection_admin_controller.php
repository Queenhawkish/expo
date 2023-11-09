<?php 

session_start();


if (isset($_SESSION['admin'])){
    header('Location: calendar_controller.php');
    exit();
}

$error = [];

require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";

require_once "../models/login_admin.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login)) {
        $error['login'] = 'Veuillez renseigner votre login';
    }

    if (empty($password)) {
        $error['password'] = 'Veuillez renseigner votre mot de passe';
    }

    if (empty($error)) {
        if (!LoginAdmin::checkLoginAdmin($login)) {
            $error['login'] = 'Login incorrect';
        } else {
            if (!LoginAdmin::checkPasswordAdmin($login, $password)) {
                $error['password'] = 'Mot de passe incorrect';
            } else {
                $_SESSION['admin'] = $login;
                header('Location: calendar_controller.php');
                exit();
            }
        }
    }
}


include "../views/connection_admin.php";