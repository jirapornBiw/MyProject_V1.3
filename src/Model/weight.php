<?php
namespace App\Model;
use App\Database\Db;

class weight extends Db{
     public function getAllWeight(){
         $sql = "
            SELECT 
                weight.id,
                weight.weight,
                weight.name
            FROM weight
          
         ";
         $stmt = $this->pdo->query($sql);
         $data = $stmt->fetchall();
         return $data;
     }
 }

?>