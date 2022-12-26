<?php
namespace App\Model;

use App\Database\Db;

class Farmer extends Db{

    public function getAllFarmer(){
        $sql = "
            SELECT * FROM Farmer
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}
?>