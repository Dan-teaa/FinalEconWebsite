<?php
namespace app\models;
require_once 'Model.php';

class MemberModel extends Model {
    public function addMember($data) {
        try {

            $db = $this->connect();
            $sql = "INSERT INTO members (first_name, last_name, email, major, minor, school, is_active) 
                    VALUES (:first_name, :last_name, :email, :major, :minor, :school, :is_active)";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute([
                ':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':email' => $data['email'],
                ':major' => $data['major'],
                ':minor' => $data['minor'],
                ':school' => $data['school'],
                ':is_active' => true
            ]);
            
            
            return $result;
        } catch (PDOException $e) {
            error_log("PDOException: " . $e->getMessage());
            return false;
        }
    }
}

?>
