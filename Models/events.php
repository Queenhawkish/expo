<?php 

class event {

    private int $id;
    private string $poster;
    private string $name;
    private int $type;
    private string $dateStart;
    private string $dateEnd;
    private string $place;
    private string $description;
    private bool $classify;

    public static function addEvent (string $poster, string $name, int $type, string $dateStart, string $dateEnd, string $place, string $description, bool $classify): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "INSERT INTO `event` 
            (`Poster`, `Name`, `Id_Type`, `Date_start`, `Date_end`, `Place`, `Description`, `Classify`) 
            VALUES (:poster, :name, :type, :dateStart, :dateEnd, :place, :description, :classify)";
            $query = $db->prepare($sql);
            $query->bindValue(':poster', form::secureData($poster) , PDO::PARAM_STR);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':type', form::secureData($type) , PDO::PARAM_INT);
            $query->bindValue(':dateStart', form::secureData($dateStart) , PDO::PARAM_STR);
            $query->bindValue(':dateEnd', form::secureData($dateEnd) , PDO::PARAM_STR);
            $query->bindValue(':place', form::secureData($place) , PDO::PARAM_STR);
            $query->bindValue(':description', form::secureData($description) , PDO::PARAM_STR);
            $query->bindValue(':classify', form::secureData($classify) , PDO::PARAM_BOOL);
            mkdir("../assets/img/$name", 0777, true);
            
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getAllEvents(): array
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT * FROM `event`";
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }
}