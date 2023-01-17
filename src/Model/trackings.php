<?php
namespace App\Model;

use App\Database\Db;

class trackings extends Db {

	public function getAllTrackings(){
        $sql = "
            SELECT 
			pays.OrderId,
			pays.CustomerID,
			trackings.dttm AS dttm,
			trackings.shipping_company AS shipping_company,
			trackings.tracking AS tracking
			FROM pays
			LEFT JOIN orders ON pays.OrderId = orders.id
			LEFT JOIN trackings ON pays.OrderId = trackings.OrderId
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
	public function getAllTrackingsTest(){
        $sql = "
		SELECT *,
		orders.o_id,
		orders.id_customer,
		trackings.shipping_company,
		trackings.tracking,
		trackings.dttm AS dttm
					FROM orders
					LEFT JOIN pays ON orders.o_id = pays.OrderId
					LEFT JOIN trackings ON orders.o_id = trackings.OrderId
			
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addTrackingold($tracking) {
		$sql = "
			INSERT INTO trackings (
				OrderId,
				customerID,
				shipping_company, 
				tracking

				
			) VALUES (
				:OrderId,
				:company, 
				:customerID,
				:tracking
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($tracking);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	public function addTracking($trackings) {
		$sql = "
				INSERT INTO trackings (
					OrderId,
					tracking,
					shipping_company
				) VALUES (
					:o_id,
					:tracking_number,
					:shipping_company
					
				)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($trackings);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}



	public function updateOrderTrackingTest2($trackings2){
		$sql = "
			UPDATE  orders SET
				status ='จัดส่งสินค้าสำเร็จ',
				tracking_number =:tracking
			WHERE OrderId = :OrderId
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($trackings2);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	public function updateTracking($tracking){
		$sql = "
		
			UPDATE  trackings SET
				shipping_company =:company,
				tracking =:tracking
			WHERE OrderId = :OrderId
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($tracking);//จับคู่ รันในฐานข้อมูล
		return true;
	}
	public function getAllTracking($id) {
		$sql = "
			SELECT
				orders.o_id,
				orders.dttm,
				orders.status,
				orders.name,
				trackings.tracking AS tracking
			FROM 
				orders
				LEFT JOIN order_detail ON orders.o_id = order_detail.o_id
				LEFT JOIN trackings ON orders.o_id = trackings.OrderId
			WHERE
				orders.id_customer = '{$id}'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
}
