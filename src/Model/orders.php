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
			ORDER BY orders.o_id DESC
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
			WHERE status = 'รอการตรวจสอบ'
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
				orders.status,
                order_detail.p_id AS product_id,
				provinces.name_th as provinces,
				amphures.name_th as amphures,
				districts.name_th as districts,
				claims.image AS imageClaim
			FROM 
				orders
                LEFT JOIN order_detail ON orders.o_id = order_detail.d_id
				LEFT JOIN customers ON customers.id = orders.id_customer
				LEFT JOIN provinces ON orders.provinces = provinces.id
				LEFT JOIN amphures ON orders.amphures = amphures.id
				LEFT JOIN districts ON orders.districts = districts.id
				LEFT JOIN claims ON claims.OrderId = orders.o_id 
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
				orders.total,
				orders.gmail,
				orders.status,
				order_detail.p_id AS product_id,
				weight.name AS weight,
				order_detail.qty AS qty,
				order_detail.pricetotal AS pricetotal,
				products.name AS product_name,
				provinces.name_th as provinces

			FROM 
				orders
				LEFT JOIN order_detail ON orders.o_id = order_detail.o_id
				LEFT JOIN products ON order_detail.p_id = products.id
				LEFT JOIN weight ON order_detail.p_id = weight.id
				LEFT JOIN customers ON customers.id = orders.id_customer
				LEFT JOIN provinces ON customers.provinces = provinces.id
				LEFT JOIN amphures ON customers.amphures = amphures.id
				LEFT JOIN districts ON customers.districts = districts.id
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
				orders.id_customer = '{$id}' AND orders.status = 'รอการชำระเงิน'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function getAllOrderDetailByCustomerPre($id) {
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
				orders.id_customer = '{$id}' AND orders.status = 'รอการตรวจสอบ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function getAllOrderDetailByCustomerTrack($id) {
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
				orders.id_customer = '{$id}' AND orders.status = 'จัดส่งสินค้าสำเร็จ'
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function addNewTK($order) {
		$sql = "
			UPDATE  trackings SET 
			tracking_number = :tracking_number,
			shipping_company = :shipping_company
			WHERE o_id = :o_id
			";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($order);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	public function addNewTK2($order) {
		$sql = "
			UPDATE  orders SET 
			tracking_number = :tracking_number,
			shipping_company = :shipping_company
			WHERE OrderId = :o_id
			";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($order);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	public function updateOrderTrackingTest($orders){
		$sql = "
			UPDATE  orders SET
				status ='จัดส่งสินค้าสำเร็จ',
				tracking_number =:tracking_number
			WHERE o_id = :o_id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($orders);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	public function getCountOrders() {
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

	public function updateOrderStatusCancel($orders){
		$sql = "
			UPDATE  orders SET
				status ='ยกเลิกการสั่งซื้อ'
			WHERE o_id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($orders);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	public function getAllOrdersTT() {
		
		$countorderObj = new orders();
$countorder = $countorderObj->getCountOrders();
//$orders = $ordersObj->getAllOrders();
//$query=mysqli_query($conn,"SELECT COUNT(o_id) FROM orders");
//print_r($countorder);
//$nquery=$countorderObj->getShippingOrders();
//	print_r($nquery);
//print_r($query);

//$row = mysqli_fetch_row($query);
//$countorders = $countorder[0];
$page_rows = 9;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
 
	$last = ceil($countorder/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$nquery=$countorderObj->getNewOrders();
	//print_r($nquery);
 	//exit;
	$paginationCtrls = '';
	//print_r($nquery);
 	//exit;
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-dark">'.$i.'</a> &nbsp; ';
			}
	}
}
 
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
 
if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-dark">Next</a> ';
}}
	}
}
