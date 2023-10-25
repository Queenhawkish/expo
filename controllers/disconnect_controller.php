<?php

session_start();

if (isset($_SESSION['user']) || isset($_SESSION['manager'])) {
    session_unset();
    session_destroy();
    header('Location: home_controller.php');
    exit;
} else {
    header('Location: home_controller.php');
    exit;
}