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

    public static function existAlbum(int $id) : bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `album` WHERE `id_event` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->execute();
            $query->fetchColumn() == 1 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getIdAlbum(string $name): int
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT `id` FROM `album` WHERE `name` = :name";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC)["id"];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return 0;
        }
    }

    public static function checkIdAlbum(int $id): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `album` WHERE `id_event` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->execute();
            $query->fetchColumn() == 1 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function checkAlbumName(string $album_name): bool
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

    public static function getAlbumByEventId(int $id): array
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT * FROM `album` WHERE `id_event` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public static function deleteAlbum(int $id): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "DELETE FROM `album` WHERE `id_event` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

}