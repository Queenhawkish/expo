<?php

session_start();

require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';

require_once '../models/events.php';
require_once '../models/album.php';
require_once '../models/picture.php';
require_once '../models/type.php';


$today = date('d');


function getEventDate(array $event)
{

    $date_start = $event['date_start'];
    $date_end = $event['date_end'];
    $type = $event['type_id'];
    $date_start = explode('-', $date_start);
    $date_end = explode('-', $date_end);
    $day_start = $date_start[2];
    $month_start = $date_start[1];
    $day_end = $date_end[2];
    $month_end = $date_end[1];
    $month = array(
        "Janvier" => 1,
        "Février" => 2,
        "Mars" => 3,
        "Avril" => 4,
        "Mai" => 5,
        "Juin" => 6,
        "Juillet" => 7,
        "Août" => 8,
        "Septembre" => 9,
        "Octobre" => 10,
        "Novembre" => 11,
        "Décembre" => 12
    );
    $month_start = array_search($month_start, $month);
    $month_end = array_search($month_end, $month);
    if($type == 1){
        $date = "Du " . $day_start . " " . $month_start . " au " . $day_end . " " . $month_end;
    }else{
        $date = $day_start . " " . $month_start;
    }
    return $date;
}

function getPicture(array $event)
{
    $type = $event['type_id'];
    $event_id = $event['event_id'];
    if ($type == 1) {
        $album = $event['album_name'];
        $picture = $event['poster'];
        $path = "../assets/img/" . $album . "/" . $picture;
    } else if ($type == 2) {
        $path = "../assets/img/other/sortie.jpg";
    } else if ($type == 3){
        $path = "../assets/img/other/assemblee.jpg";
    }
    return $path;
}



include '../views/calendar.php';
