<?php 

class Event {

    private int $id;
    private string $poster;
    private string $name;
    private int $type;
    private string $dateStart;
    private string $dateEnd;
    private string $place;
    private string $description;
    private bool $classify;
    private string $album;
    private string $picture;

    public static function addEvent (string $poster, string $name, int $type, string $dateStart, string $dateEnd, string $place, string $description, bool $classify): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "INSERT INTO `event`
            (`poster`, `name`, `id_type`, `date_start`, `date_end`, `place`, `description`, `classify`)
            VALUES (:poster, :name, :type, :dateStart, :dateEnd, :place, :description, :classify);";


            $query = $db->prepare($sql);
            $query->bindValue(':poster', form::secureData($poster) , PDO::PARAM_STR);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':type', form::secureData($type) , PDO::PARAM_INT);
            $query->bindValue(':dateStart', form::secureData($dateStart) , PDO::PARAM_STR);
            $query->bindValue(':dateEnd', form::secureData($dateEnd) , PDO::PARAM_STR);
            $query->bindValue(':place', form::secureData($place) , PDO::PARAM_STR);
            $query->bindValue(':description', form::secureData($description) , PDO::PARAM_STR);
            $query->bindValue(':classify', form::secureData($classify) , PDO::PARAM_BOOL);
            
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getNameEvent(string $name){
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `event` WHERE `name` = :name";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->execute();
            $query->fetchColumn() == 1 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    
    public static function getIdEvent(string $name): int
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT `id` FROM `event` WHERE `name` = :name";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC)['id'];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return 0;
        }
    }

    public static function getNewYear(): array
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT 
                        YEAR(`date_start`)
                    FROM
                        `event`
                    WHERE
                    `date_end` > now()
                    GROUP BY YEAR(`date_start`);";
            $query = $db->query($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }


    public static function getNewEvents(string $year, int $type): array
    {
        try {
            $db = database::getDatabase();
            $year = $year . '%';
            $sql = "SELECT 
                        `event`.`id` `event_id`,
                        `poster`,
                        `event`.`name` `event_name`,
                        `date_start` ,
                        `date_end`,
                        `place`,
                        `description`,
                        `classify`,
                        `type`.`id` `type_id`,
                        `type`.`type` `type_name`,
                        `album`.`id` `album_id`,
                        `album`.`name` `album_name`
                    FROM
                        `event`
                            INNER JOIN
                        `type` ON `id_type` = `type`.`id`
                            LEFT JOIN 
                        `album` ON `id_event` = `event`.`id`
                    WHERE
                        `date_end` LIKE :year
                        and `id_type` = :type";
            $query = $db->prepare($sql);
            $query->bindValue(':year', form::secureData($year), PDO::PARAM_STR);
            $query->bindValue(':type', form::secureData($type), PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public static function getEventById(int $id): array
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT 
                        *
                    FROM
                        `event`
                    WHERE
                        `event`.`id` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id), PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public static function deleteEvent(int $id): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "DELETE FROM `event` WHERE `id` = :id";
            $query = $db->prepare($sql);
            $query->bindValue(':id', form::secureData($id), PDO::PARAM_INT);
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

}