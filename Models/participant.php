<?php


class Participant {

    private int $id;
    private string $email;
    private int $id_event;



    public static function addParticipant (string $email, int $id_event): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "INSERT INTO `user_participant`
            (`email`,
             `id_event`)
            VALUES 
            (:email, 
            :id_event)";

            $query = $db->prepare($sql);
            $query->bindValue(':email', form::secureData($email) , PDO::PARAM_STR);
            $query->bindValue(':id_event', form::secureData($id_event) , PDO::PARAM_INT);
            
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    public static function getParticipant(int $id_event) : array
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT * FROM `user_participant` WHERE `id_event` = :id_event";
            $query = $db->prepare($sql);
            $query->bindValue(':id_event', form::secureData($id_event) , PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }
}