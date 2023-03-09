<?php
namespace App\Model;
use App\Database\Db;

class productweight extends Db{
     public function getAllWeight(){
         $sql = "
            SELECT 
                productweight.WeightID AS id,
                productweight.Weight AS weight,
                productweight.Name AS name
            FROM productweight
          
         ";
         $stmt = $this->pdo->query($sql);
         $data = $stmt->fetchall();
         return $data;
     }
 }

?>