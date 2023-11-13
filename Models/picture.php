<?php 

class Picture {

    private int $id;
    private string $name;
    private int $idAlbum;


    public static function addPicture(string $name, int $idAlbum){
        try {
            $db = database::getDatabase();
            $sql = "INSERT INTO `picture` (`name`, `id_album`) VALUES (:name, :idAlbum)";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':idAlbum', form::secureData($idAlbum) , PDO::PARAM_INT);
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getNamePicture(string $name): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `picture` WHERE `name` = :name";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->execute();
            $query->fetchColumn() == 1 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return 0;
        }
    }

    public static function getPictureNameByAlbumId(int $id): string
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT `name` FROM `picture` WHERE `id_album` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return "";
        }
    }

    public static function deletePicture(int $id): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "DELETE FROM `picture` WHERE `id_album` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}