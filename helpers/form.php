<?php

class Form
{
    // Création d'une fonction pour sécuriser les données envoyées par l'utilisateur
    public static function secureData($data)
    {
        // Supprime les espaces inutiles, les antislashs et les caractères spéciaux
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        // Retourne les données sécurisées
        return $data;
    }
    
    public static function noAccent($word): string
    {
        $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
        $newword = str_replace($search, $replace, $word);
        return $newword;
    }

    public static function getEventDate(array $event): string
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
        if ($type == 1) {
            $date = "Du " . $day_start . " " . $month_start . " au " . $day_end . " " . $month_end;
        } else {
            $date = $day_start . " " . $month_start;
        }
        return $date;
    }

    public static function checkParticipant($participants, $email): bool
    {
        foreach ($participants as $participant) {
            if ($email == $participant["email"]) {
                return true;
            }
        }
        return false;
    }

    public static function checkAlbum($id)
    {
        if (isset($_SESSION["admin"]) && !Album::existAlbum($id)) {
            return true;
        } else if (Album::existAlbum($id)) {
            return false;
        }
    }

    public static function checkYearEvent ($year) {
        foreach (Event::getOldEvents($year) as $events => $event) {
            if (Form::checkAlbum($event["event_id"]) === false) {
                $success = true;
            }
            if (isset($success)) {
                return true;
            }
        }
    }
}
