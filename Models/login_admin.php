<?php

class loginAdmin
{

    private int $id;
    private string $login;
    private string $password;

    public static function checkLoginAdmin(string $login): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT COUNT(*) FROM `assocalfort_administrator` WHERE login = :login";
            $query = $db->prepare($sql);
            $query->bindValue(':login', $login, PDO::PARAM_STR);
            $query->execute();
            $query->fetchColumn() == 1 ? $result = true : $result = false;

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public static function checkPasswordAdmin(string $login, string $password): bool
    {
        try {
            $db = database::getDatabase();
            $sql = "SELECT password FROM `assocalfort_administrator` WHERE login = :login";
            $query = $db->prepare($sql);
            $query->bindValue(':login', $login, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $result['password'])) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
