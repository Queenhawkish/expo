<?php 

// Je crée une classe Event qui possède des attributs et des fonctions 
// Cette classe va me permettre de gérer les événements
// Je vais pouvoir ajouter, modifier, supprimer, récupérer des événements
// dans ma base de données
class Event {

    // Je créee les attributs de la classe Event
    private int $id;
    private string $poster;
    private string $name;
    private int $type;
    private string $dateStart;
    private string $dateEnd;
    private string $place;
    private string $description;
    private string $album;
    private string $picture;

    // Je créee une fonction addEvent() qui va me permettre d'ajouter un événement et qui retourne un booléen
    public static function addEvent (string $poster, string $name, int $type, string $dateStart, string $dateEnd, string $place, string $description): bool
    {
        // J'utilise la méthode try catch pour essayer d'exécuter mon code
        // Si une erreur se produit, elle sera récupérée par le catch
        try {
            // Je me connecte à ma base de données
            $db = database::getDatabase();
            // Je créee ma requête SQL
            $sql = "INSERT INTO `event`
            (`poster`, `name`, `id_type`, `date_start`, 
             `date_end`, `place`, `description`)
            VALUES 
            (:poster, :name, :type, :dateStart, 
            :dateEnd, :place, :description)";

            // Je prépare ma requête SQL
            $query = $db->prepare($sql);
            // J'associe les valeurs reçues en paramètre aux champs de la table
            // en utilisant la méthode bindValue()
            // Je sécurise les données reçues en paramètre avec la méthode secureData()
            // Je précise le type de données reçues en paramètre avec la méthode PDO::PARAM
            $query->bindValue(':poster', form::secureData($poster) , PDO::PARAM_STR);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':type', form::secureData($type) , PDO::PARAM_INT);
            $query->bindValue(':dateStart', form::secureData($dateStart) , PDO::PARAM_STR);
            $query->bindValue(':dateEnd', form::secureData($dateEnd) , PDO::PARAM_STR);
            $query->bindValue(':place', form::secureData($place) , PDO::PARAM_STR);
            $query->bindValue(':description', form::secureData($description) , PDO::PARAM_STR);
            
            // J'exécute ma requête SQL
            return $query->execute();
        } 
        // Si une erreur se produit, elle sera récupérée par le catch
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getNameEvent(string $name) : bool
    {
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

    public static function getNameEventbyId(int $id, string $name) : bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `event` WHERE `name` = :name AND `id` != :id";
            $query = $db->prepare($sql);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
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
                        YEAR(`date_end`)
                    FROM
                        `event`
                    WHERE
                        `date_end` > DATE(NOW())
                    GROUP BY YEAR(`date_end`)
                    ORDER BY YEAR(`date_end`);";
            $query = $db->query($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    public static function getOldYear(): array
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT 
                        YEAR(`date_end`)
                    FROM
                        `event`
                    WHERE
                        `date_end` < DATE(NOW())
                    GROUP BY YEAR(`date_end`)
                    ORDER BY YEAR(`date_end`) DESC;";
            $query = $db->query($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }


    // Je créee une fonction getEvents() qui va me permettre de récupérer tous les événements futurs 
    // en fonction du type et qui retourne un tableau associatif
    public static function getNewEvents(string $year, int $type): array
    {
        // J'utilise la méthode try catch pour essayer d'exécuter mon code
        try {
            // Je me connecte à ma base de données
            $db = database::getDatabase();
            // Je modifie la valeur de $year pour qu'elle corresponde à la requete SQL
            $year = $year . '%';
            // Je créee ma requête SQL avec un alias pour les champs necessaires
            $sql = "SELECT 
                        `event`.`id` `event_id`,
                        `poster`,
                        `event`.`name` `event_name`,
                        `date_start` ,
                        `date_end`,
                        `place`,
                        `description`,
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
                        `date_end` >= date(now()) AND `id_type` = :type
                            AND `date_end` LIKE :year
                    ORDER BY `date_end`";
            
            // Je prépare ma requête SQL
            $query = $db->prepare($sql);
            // J'associe les valeurs reçues en paramètre aux champs de la table
            $query->bindValue(':year', form::secureData($year), PDO::PARAM_STR);
            $query->bindValue(':type', form::secureData($type), PDO::PARAM_INT);
            // J'exécute ma requête SQL
            $query->execute();
            // Je retourne le résultat de ma requête SQL sous forme de tableau associatif
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } 
        // Si une erreur se produit, elle sera récupérée par le catch
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    // Je créee une fonction getEvents() qui va me permettre de récupérer tous les événements passés
    // en fonction de l'année et qui retourne un tableau associatif
    public static function getOldEvents(string $year): array
    {
        // J'utilise la méthode try catch pour essayer d'exécuter mon code
        try {
            // Je me connecte à ma base de données
            $db = database::getDatabase();
            // Je modifie la valeur de $year pour qu'elle corresponde à la requete SQL
            $year = $year . '%';
            // Je créee ma requête SQL avec un alias pour les champs necessaires
            $sql = "SELECT 
                        `event`.`id` `event_id`,
                        `poster`,
                        `event`.`name` `event_name`,
                        `date_start` ,
                        `date_end`,
                        `place`,
                        `description`,
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
                        `date_end` < date(now())
                            AND `date_end` LIKE :year
                    ORDER BY `date_end`";
            // Je prépare ma requête SQL
            $query = $db->prepare($sql);
            // J'associe les valeurs reçues en paramètre aux champs de la table
            $query->bindValue(':year', form::secureData($year), PDO::PARAM_STR);
            // J'exécute ma requête SQL
            $query->execute();
            // Je retourne le résultat de ma requête SQL sous forme de tableau associatif
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } 
        // Si une erreur se produit, elle sera récupérée par le catch
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    // Je créee une fonction getEvents() qui va me permettre de récupérer tous 
    // les événements en fonction de l'id et qui retourne un tableau associatif
    public static function getEventById(int $id): array
    {
        // J'utilise la méthode try catch pour essayer d'exécuter mon code
        try {
            // Je me connecte à ma base de données
            $db = database::getDatabase();
            // Je créee ma requête SQL avec un alias pour les champs necessaires
            $sql = "SELECT
                        `event`.`id` `event_id`,
                        `poster`,
                        `event`.`name` `event_name`,
                        `date_start`,
                        `date_end`,
                        `place`,
                        `description`,
                        `id_type` `type_id`,
                        `album`.`name` `album_name`
                    FROM
                        `event`
                            LEFT JOIN
                        `album` ON `id_event` = `event`.`id`
                    WHERE
                        `event`.`id` = :id";
            // Je prépare ma requête SQL
            $query = $db->prepare($sql);
            // J'associe les valeurs reçues en paramètre aux champs de la table
            $query->bindValue(':id', form::secureData($id), PDO::PARAM_INT);
            // J'exécute ma requête SQL
            $query->execute();
            // Je retourne le résultat de ma requête SQL sous forme de tableau associatif
            return $query->fetch(PDO::FETCH_ASSOC);
        } 
        // Si une erreur se produit, elle sera récupérée par le catch
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }
    
    // Je créee une fonction deleteEvent() qui va me permettre de supprimer  
    // un événement en fonction de son id et qui retourne un booléen
    public static function deleteEvent(int $id): bool
    {
        // J'utilise la méthode try catch pour essayer d'exécuter mon code
        try {
            // Je me connecte à ma base de données
            $db = database::getDatabase();
            // Je créee ma requête SQL
            $sql = "DELETE FROM `event` WHERE `id` = :id";
            // Je prépare ma requête SQL
            $query = $db->prepare($sql);
            // J'associe les valeurs reçues en paramètre aux champs de la table
            $query->bindValue(':id', form::secureData($id), PDO::PARAM_INT);
            // J'exécute ma requête SQL
            return $query->execute();
        } 
        // Si une erreur se produit, elle sera récupérée par le catch
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    // Je créee une fonction updateEvent() qui va me permettre de modifier un événement et qui retourne un booléen
    public static function updateEvent(int $id, string $poster, string $name, int $type, string $dateStart, string $dateEnd, string $place, string $description): bool
    {
        // J'utilise la méthode try catch pour essayer d'exécuter mon code
        try {
            // Je me connecte à ma base de données
            $db = database::getDatabase();
            // Je créee ma requête SQL
            $sql = "UPDATE `event`
                    SET
                        `poster` = :poster,
                        `name` = :name,
                        `id_type` = :type,
                        `date_start` = :dateStart,
                        `date_end` = :dateEnd,
                        `place` = :place,
                        `description` = :description
                    WHERE
                        `id` = :id;";
            // Je prépare ma requête SQL
            $query = $db->prepare($sql);
            // J'associe les valeurs reçues en paramètre aux champs de la table
            $query->bindValue(':id', form::secureData($id) , PDO::PARAM_INT);
            $query->bindValue(':poster', form::secureData($poster) , PDO::PARAM_STR);
            $query->bindValue(':name', form::secureData($name) , PDO::PARAM_STR);
            $query->bindValue(':type', form::secureData($type) , PDO::PARAM_INT);
            $query->bindValue(':dateStart', form::secureData($dateStart) , PDO::PARAM_STR);
            $query->bindValue(':dateEnd', form::secureData($dateEnd) , PDO::PARAM_STR);
            $query->bindValue(':place', form::secureData($place) , PDO::PARAM_STR);
            $query->bindValue(':description', form::secureData($description) , PDO::PARAM_STR);
            // J'exécute ma requête SQL
            return $query->execute();
        } 
        // Si une erreur se produit, elle sera récupérée par le catch
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

}