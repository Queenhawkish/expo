<?php

// Je créer une classe database qui me permettra de me connecter à la base de données
class database {
    public static function getDatabase(){
        $dbh = 'mysql:host='. HOST .';dbname='. DBNAME .';charset=utf8';
        // Je créer un objet PDO qui me permettra de me connecter à la base de données en utilisant 
        // les constantes définies dans config.php ainsi que la méthode try catch pour gérer les erreurs
        try {
            $db = new PDO($dbh, USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Connexion failed : ' . $e->getMessage();
        }
    }
}