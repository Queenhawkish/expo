<?php

class database {
    public static function getDatabase(){
        $dbh = 'mysql:host='. HOST .';dbname='. DBNAME .';charset=utf8';
        try {
            $db = new PDO($dbh, USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Connexion failed : ' . $e->getMessage();
        }
    }
}