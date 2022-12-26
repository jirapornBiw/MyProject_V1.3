<?php
namespace App\Model;

use App\Database\Db;

class type extends Db {

	public function getAllOrder_detail() {
		$sql = "
			SELECT
				order_detail.id,
				order_detail.order_id,
				order_detail.product_id,
				order_detail.qty,
				order_detail.subtotal,
			FROM 
				order_detail
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();
		return $data;
	}

}
?>