<?php
namespace App\Model;

use App\Database\Db;

class type extends Db {

	public function getAllTypes() {
		$sql = "
			SELECT
				type.id,
				type.name
			FROM 
				type
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();
		return $data;
	}

}
?>