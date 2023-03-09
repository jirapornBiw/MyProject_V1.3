<?php

namespace App\Model;

use App\Database\Db;

class orders extends Db
{

	public function getAllOrders()
	{
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.status
			FROM 
                orders
			ORDER BY orders.o_id DESC
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getCountOrdersByIDALL($id_customer)
	{
		$sql = "
		SELECT COUNT(o_id) 
		FROM orders 
		WHERE id_customer = '{$id_customer}'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchColumn($id_customer);/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getCountOrdersByID($id)
	{
		$sql = "
		SELECT COUNT(o_id) 
		FROM orders 
		WHERE id_customer = '{$id}' AND status = ''
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll($id);/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getNewOrders()
	{
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
	public function getPaymentOrders()
	{
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.status
				
			FROM 
                orders
			WHERE status = 'รอการตรวจสอบ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}

	public function getShippingOrders()
	{
		$sql = "
			SELECT
                orders.o_id,
                orders.name,
                orders.dttm,
                orders.total,
				orders.tracking_number,
				orders.status
				
			FROM 
                orders
			WHERE status = 'จัดส่งสินค้าสำเร็จ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getOrderById($o_id)
	{
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
			orders.status,
			orders.tracking_number,
			orderdetail.p_id AS product_id,
			provinces.name_th as provinces,
			amphures.name_th as amphures,
			districts.name_th as districts,
			claims.image AS imageClaim,
			claims.url AS videoClaim,
			trackings.ShippingCompany AS shipping_company
	FROM 
		orders
			LEFT JOIN orderdetail ON orders.o_id = orderdetail.d_id
			LEFT JOIN customers ON customers.id = orders.id_customer
			LEFT JOIN provinces ON orders.provinces = provinces.id
			LEFT JOIN amphures ON orders.amphures = amphures.id
			LEFT JOIN districts ON orders.districts = districts.id
			LEFT JOIN claims ON claims.OrderId = orders.o_id 
			LEFT JOIN trackings ON trackings.OrderId = orders.o_id 
	WHERE
		orders.o_id = ?
            
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$o_id]);
		$data = $stmt->fetchAll();
		return $data[0];
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function getAllOrderDetail($o_id)
	{
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
				orders.status,
				orderdetail.p_id AS product_id,
				productweight.Name AS weight,
				orderdetail.qty AS qty,
				orderdetail.pricetotal AS pricetotal,
				products.name AS product_name,
				provinces.name_th as provinces,
				orders.tracking_number AS tracking_number,
				trackings.tracking AS shipping_company,
				claims.url AS videoClaim
				

			FROM 
				orders
				LEFT JOIN orderdetail ON orders.o_id = orderdetail.o_id
				LEFT JOIN products ON orderdetail.p_id = products.id
				LEFT JOIN productweight ON orderdetail.p_id = productweight.WeightID
				LEFT JOIN customers ON customers.id = orders.id_customer
				LEFT JOIN provinces ON customers.provinces = provinces.id
				LEFT JOIN amphures ON customers.amphures = amphures.id
				LEFT JOIN districts ON customers.districts = districts.id
				LEFT JOIN claims ON claims.OrderId = orders.o_id 
				LEFT JOIN trackings ON orders.o_id = trackings.OrderId
			WHERE
				orders.o_id = '{$o_id}' 
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	public function getAllOrderDetailByCustomer($id)
	{
		$sql = "
			SELECT
				orders.*,
				orderdetail.p_id AS product_id,
				orderdetail.qty AS qty,
				orderdetail.pricetotal AS subtotal,
				products.name AS product_name
			FROM 
				orders
				LEFT JOIN orderdetail ON orders.o_id = orderdetail.o_id
				LEFT JOIN products ON orderdetail.p_id = products.id
			WHERE
				orders.id_customer = '{$id}' AND orders.status = 'รอการชำระเงิน'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function getAllOrderDetailByCustomerPre($id)
	{
		$sql = "
			SELECT
				orders.*,
				orderdetail.p_id AS product_id,
				orderdetail.qty AS qty,
				orderdetail.pricetotal AS subtotal,
				products.name AS product_name
			FROM 
				orders
				LEFT JOIN orderdetail ON orders.o_id = orderdetail.o_id
				LEFT JOIN products ON orderdetail.p_id = products.id
			WHERE
				orders.id_customer = '{$id}' AND orders.status = 'รอการตรวจสอบ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function getAllOrderDetailByCustomerTrack($id)
	{
		$sql = "
			SELECT
				orders.*,
				orderdetail.p_id AS product_id,
				orderdetail.qty AS qty,
				orderdetail.pricetotal AS subtotal,
				products.name AS product_name
			FROM 
				orders
				LEFT JOIN orderdetail ON orders.o_id = orderdetail.o_id
				LEFT JOIN products ON orderdetail.p_id = products.id
			WHERE
				orders.id_customer = '{$id}' AND orders.status = 'จัดส่งสินค้าสำเร็จ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function addNewTK($order)
	{
		$sql = "
			UPDATE  trackings SET 
			tracking_number = :tracking_number,
			shipping_company = :shipping_company
			WHERE o_id = :o_id
			";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($order); //จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	// public function addNewTK2($order)
	// {
	// 	$sql = "
	// 		UPDATE  orders SET 
	// 		tracking_number = :tracking_number,
	// 		shipping_company = :shipping_company
	// 		WHERE OrderId = :o_id
	// 		";
	// 	$stmt = $this->pdo->prepare($sql);
	// 	$stmt->execute($order); //จับคู่ รันในฐานข้อมูล
	// 	return $this->pdo->lastInsertId();
	// }

	public function updateOrderTrackingTest($orders)
	{
		$sql = "
			UPDATE  orders SET
				status ='จัดส่งสินค้าสำเร็จ',
				tracking_number =:tracking_number
			WHERE o_id = :o_id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($orders); //จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	public function updateOrderTrackingClaim($orders)
	{
		$sql = "
			UPDATE  orders SET
				status ='รอการตรวจสอบพัสดุเสียหาย'
			WHERE o_id = :OrderId
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($orders); //จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	public function updateOrderTrackingClaimAdmin($tracking)
	{
		$sql = "
			UPDATE  orders SET
				status ='จัดส่งสินค้าสำเร็จ'
			WHERE o_id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($tracking); //จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	public function getCountOrders()
	{
		//include("../Database/connect.php");
		$sql = "
			SELECT COUNT(o_id) 
			FROM orders
			WHERE status ='จัดส่งสินค้าสำเร็จ'
		";
		$stmt = $this->pdo->query($sql);
		//WHERE status ='จัดส่งสินค้าสำเร็จ'
		$data = $stmt->fetchColumn();/*ดึงข้อมูลออกมา*/
		return $data;
	}

	public function updateOrderStatusCancel($orders)
	{
		$sql = "
			UPDATE  orders SET
				status ='ยกเลิกการสั่งซื้อ'
			WHERE o_id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($orders); //จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	public function UpdateNoPass($order2)
	{
		$sql = "
			UPDATE  orders SET
				status ='ตรวจสอบไม่ผ่าน'
			WHERE o_id = :id
			";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($order2); //จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
}
