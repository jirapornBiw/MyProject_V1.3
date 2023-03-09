<?php
namespace App\Model;

use App\Database\Db;

class producttype extends Db {

	public function getAllTypes() {
		$sql = "
			SELECT
				ProductType.TypeID AS id,
				ProductType.Name AS name
			FROM 
				ProductType
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();
		return $data;
	}

}
?>