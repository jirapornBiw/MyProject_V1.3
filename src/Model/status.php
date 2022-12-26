<?php
namespace App\Model;

use App\Database\Db;

class status extends Db {

	public function getAllStatus() {
		$sql = "
			SELECT
				status.id,
				status.name
			FROM 
				status
		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();
		return $data;
	}

}
?>