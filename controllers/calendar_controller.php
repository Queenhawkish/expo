<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';


$today = date('d');


function getNameMonth($month)
{
    if ($month == 12) {
        $month = "Décembre";
    }
    if ($month == 11) {
        $month = "Novembre";
    }
    if ($month == 10) {
        $month = "Octobre";
    }
    if ($month == 9) {
        $month = "Septembre";
    }
    if ($month == 8) {
        $month = "Août";
    }
    if ($month == 7) {
        $month = "Juillet";
    }
    if ($month == 6) {
        $month = "Juin";
    }
    if ($month == 5) {
        $month = "Mai";
    }
    if ($month == 4) {
        $month = "Avril";
    }
    if ($month == 3) {
        $month = "Mars";
    }
    if ($month == 2) {
        $month = "Février";
    }
    if ($month == 1) {
        $month = "Janvier";
    }
    return $month;
}




include '../views/calendar.php';
