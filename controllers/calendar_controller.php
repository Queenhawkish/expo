<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';


$year = date('Y');
$today = date('d');
$this_month = date('m');
if ($this_month == 12) {
    $this_month = "Décembre";
}
if ($this_month == 11) {
    $this_month = "Novembre";
}
if ($this_month == 10) {
    $this_month = "Octobre";
}
if ($this_month == 9) {
    $this_month = "Septembre";
}
if ($this_month == 8) {
    $this_month = "Août";
}
if ($this_month == 7) {
    $this_month = "Juillet";
}
if ($this_month == 6) {
    $this_month = "Juin";
}
if ($this_month == 5) {
    $this_month = "Mai";
}
if ($this_month == 4) {
    $this_month = "Avril";
}
if ($this_month == 3) {
    $this_month = "Mars";
}
if ($this_month == 2) {
    $this_month = "Février";
}
if ($this_month == 1) {
    $this_month = "Janvier";
}
$this_day = $today . " " . $this_month;
// var_dump($ip);

foreach (Event::getNewEvents() as $event) {
    $first_date = explode(" ", $event["date_start"])[0];
    $first_date = explode("-", $first_date);
    if ($first_date[1] == 12) {
        $month_date = "Décembre";
    }
    if ($first_date[1] == 11) {
        $month_date = "Novembre";
    }
    if ($first_date[1] == 10) {
        $month_date = "Octobre";
    }
    if ($first_date[1] == 9) {
        $month_date = "Septembre";
    }
    if ($first_date[1] == 8) {
        $month_date = "Août";
    }
    if ($first_date[1] == 7) {
        $month_date = "Juillet";
    }
    if ($first_date[1] == 6) {
        $month_date = "Juin";
    }
    if ($first_date[1] == 5) {
        $month_date = "Mai";
    }
    if ($first_date[1] == 4) {
        $month_date = "Avril";
    }
    if ($first_date[1] == 3) {
        $month_date = "Mars";
    }
    if ($first_date[1] == 2) {
        $month_date = "Février";
    }
    if ($first_date[1] == 1) {
        $month_date = "Janvier";
    }
    $Date_start = $first_date[2] . " " . $month_date;
}





include '../views/calendar.php';
