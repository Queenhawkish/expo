<?php 

class type {
    
        private int $id;
        private string $name;
    
        public static function getAllTypes()
        {
            try {
                $db = database::getDatabase();
                $sql = "SELECT * FROM `types`";
                $query = $db->query($sql);
                $types = $query->fetchAll(PDO::FETCH_ASSOC);
                return $types;
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
    
        
}