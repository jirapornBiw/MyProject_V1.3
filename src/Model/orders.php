<?php
namespace App\Model;

use App\Database\Db;

class orders extends Db {

    public function getAllOrders() {
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.status
				
			FROM 
                orders
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getNewOrders() {
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.status
				
			FROM 
                orders
			WHERE status = 'รอการชำระเงิน'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getPaymentOrders() {
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.status
				
			FROM 
                orders
			WHERE status = 'ชำระเงินสำเร็จ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	
	public function getShippingOrders() {
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.status
				
			FROM 
                orders
			WHERE status = 'รอการจัดส่ง'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
    public function getOrderById($o_id){
		$sql = "
			SELECT
				orders.o_id,
                orders.dttm,
                orders.name,
                orders.address,
                orders.postcode,
                orders.phone,
				orders.total,
                orders.gmail,
                order_detail.p_id AS product_id
			FROM 
				orders
                LEFT JOIN order_detail ON orders.o_id = order_detail.d_id
			WHERE
				orders.o_id = ?
            
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$o_id]);
		$data = $stmt->fetchAll();
		return $data[0];
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function getAllOrderDetail($o_id) {
		$sql = "
			SELECT
				orders.o_id,
				orders.dttm,
				orders.name,
				orders.address,
				orders.postcode,
				orders.phone,
				orders.gmail,
				order_detail.p_id AS product_id,
				order_detail.qty AS qty,
				order_detail.pricetotal AS pricetotal,
				products.name AS product_name
			FROM 
				orders
				LEFT JOIN order_detail ON orders.o_id = order_detail.o_id
				LEFT JOIN products ON order_detail.p_id = products.id
			WHERE
				orders.o_id = '{$o_id}'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getAllOrderDetailByCustomer($id) {
		$sql = "
			SELECT
				orders.*,
				order_detail.p_id AS product_id,
				order_detail.qty AS qty,
				order_detail.pricetotal AS subtotal,
				products.name AS product_name
			FROM 
				orders
				LEFT JOIN order_detail ON orders.o_id = order_detail.o_id
				LEFT JOIN products ON order_detail.p_id = products.id
			WHERE
				orders.id_customer = '{$id}'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function addNewTK($order) {
		$sql = "
			UPDATE  orders SET 
			tracking_number = :tracking_number
			WHERE o_id = :o_id
			";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($order);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
}
