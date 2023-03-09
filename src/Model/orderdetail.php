<?php
namespace App\Model;

use App\Database\Db;

class type extends Db {

	public function getAllOrder_detail() {
		$sql = "
			SELECT
				orderdetail.id,
				orderdetail.order_id,
				orderdetail.product_id,
				orderdetail.qty,
				orderdetail.subtotal,
			FROM 
				orderdetail
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();
		return $data;
	}

}
?>