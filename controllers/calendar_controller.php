<?php

$year = date('Y');
$today = date('d');
$this_month = date('m');





$name_month = [
    'Janvier' => "01", 
    'Février' => "02", 
    'Mars' => "03",
    'Avril' => "04",
    'Mai' => "05",
    'Juin' => "06",
    'Juillet' => "07",
    'Août' => "08",
    'Septembre' => "09",
    'Octobre' => "10",
    'Novembre' => "11",
    'Décembre' => "12" 
];

include '../views/calendar.php';