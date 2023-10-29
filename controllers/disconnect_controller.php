<?php

session_start();

if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    session_unset();
    session_destroy();
    header('Location: home_controller.php');
    exit;
} else {
    header('Location: home_controller.php');
    exit;
}