<?php

session_start();


$year = date('Y');
$today = date('d');
$this_month = date('m');
if ($this_month == 12){
    $this_month = "Décembre";
}
if ($this_month == 11){
    $this_month = "Novembre";
}
if ($this_month == 10){
    $this_month = "Octobre";
}
if ($this_month == 9){
    $this_month = "Septembre";
}
if ($this_month == 8){
    $this_month = "Août";
}
if ($this_month == 7){
    $this_month = "Juillet";
}
if ($this_month == 6){
    $this_month = "Juin";
}
if ($this_month == 5){
    $this_month = "Mai";
}
if ($this_month == 4){
    $this_month = "Avril";
}
if ($this_month == 3){
    $this_month = "Mars";
}
if ($this_month == 2){
    $this_month = "Février";
}
if ($this_month == 1){
    $this_month = "Janvier";
}
$this_day = $today . " " . $this_month;
// var_dump($ip);







include '../views/calendar.php';