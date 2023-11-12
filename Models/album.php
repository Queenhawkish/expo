<?php

class Album {

    private int $id;
    private string $name;
    private int $idEvent;


    public static function addAlbum(string $name, int $idEvent){
        try {
            $db = database::getDatabase();
            $sql = "INSERT INTO `album` (`name`, `id_event`) VALUES (:name, :idEvent)";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':idEvent', form::secureData($idEvent) , PDO::PARAM_INT);
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getIdAblum(string $name): int
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT `id` FROM `album` WHERE `name` = :name";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC)['id'];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return 0;
        }
    }

    public static function getAlbumName(string $album_name): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `album` WHERE `name` = :album_name";
            $query = $db->prepare($sql);
            $query->bindValue(':album_name', form::secureData($album_name) , PDO::PARAM_STR);
            $query->execute();
            $query->fetchColumn() == 1 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public static function getAlbumId(int $id): string
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT `name` FROM `album` WHERE `id` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC)['name'];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public static function getEventId(int $id): int
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT `id_event` FROM `album` WHERE `id` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC)['id_event'];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

}