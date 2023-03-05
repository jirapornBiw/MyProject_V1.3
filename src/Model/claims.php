<?php
namespace App\Model;

use App\Database\Db;

class claims extends Db {

	public function getAllClaims(){
        $sql = "
            SELECT 
			claims.CustomerID,
			claims.image,
			claims.url,
			claims. OrderId,
			claims.status,
			claims.details,
			claims.dttm
			FROM claims
			LEFT JOIN orders orders ON claims.OrderId = orders.o_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
	public function getClaimsByID(){
        $sql = "
            SELECT 
			claims.CustomerID,
			claims.image,
			claims. OrderId,
			claims.status,
			claims.details,
			claims.dttm
			FROM claims
			LEFT JOIN orders orders ON claims.OrderId = orders.o_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }


    public function addClaim($claim) {
		$sql = "
			INSERT INTO claims (
				CustomerID, 
				url,
                OrderId,
				status,
				details

				
			) VALUES (
				:CustomerID, 
				:url,
                :OrderId,
				'อยู่ระหว่างการตรวจสอบพัสดุเสียหาย',
				:details
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($claim);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
}