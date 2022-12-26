<?php
namespace App\Model;

use App\Database\Db;

class claims extends Db {

	public function getAllClaims(){
        $sql = "
            SELECT 
			claims.CustomerID,
			claims.image,
			claims. OrderId,
			claims.status,
			claims.details,
			claims.dttm
			FROM claims
			LEFT JOIN orders ON claims.OrderId = orders.id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }


    public function addClaim($claim) {
		$sql = "
			INSERT INTO claims (
				CustomerID, 
				image,
                OrderId,
				status,
				details

				
			) VALUES (
				:CustomerID, 
				:image,
                :OrderId,
				'รอการตรวจสอบ',
				:details
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($claim);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
}