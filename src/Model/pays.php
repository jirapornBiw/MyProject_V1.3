<?php
namespace App\Model;

use App\Database\Db;

class pays extends Db {

	public function getAllPay(){
        $sql = "
            SELECT * FROM pays
			LEFT JOIN orders ON pays.OrderId = orders.o_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

	public function getAllPayById($pay){
        $sql = "
            SELECT * FROM pays
			LEFT JOIN orders ON pays.OrderId = orders.o_id
			WHERE OrderId = :OrderId
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll($pay);
        return $data;
    }

    public function addPay($pay) {
		$sql = "
			INSERT INTO pays (
				CustomerID, 
				image,
                OrderId,
				status

				
			) VALUES (
				:CustomerID, 
				:image,
                :OrderId,
				'รอการตรวจสอบ'
			)
		";
		
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($pay);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	public function updatePay($pay) {
		$sql = "
			INSERT INTO pays (
				CustomerID, 
				image,
                OrderId,
				status

				
			) VALUES (
				:CustomerID, 
				:image,
                :OrderId,
				'รอการตรวจสอบ'
			)
		";
		
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($pay);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	/*public function addPay($pay) {
		$sql = "
			INSERT INTO pays (
				CustomerID, 
				image,
                OrderId,
				status

				
			) VALUES (
				:CustomerID, 
				:image,
                :OrderId,
				'รอการตรวจสอบ'
			)
		";
		
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($pay);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}*/
	public function updateStatusCorrect($pay2){
		$sql = "
			UPDATE  orders SET
			status = 'รอการตรวจสอบ'
			WHERE o_id = :OrderId
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($pay2);//จับคู่ รันในฐานข้อมูล
		return true;
	}
	/*ต้นฉบับ
	public function updateStatusCorrect($pay){
		$sql = "
			UPDATE  orders SET
				status =:action
			WHERE id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($pay);//จับคู่ รันในฐานข้อมูล
		return true;
	}*/
}
