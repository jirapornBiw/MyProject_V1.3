<?php
namespace App\Model;

use App\Database\Db;

class product extends Db {

	public function getAllProduct() {
		$sql = "
			SELECT
				products.id,
				products.image,
				type.name AS type,
				products.name,
				products.Products_Detail,
				weight.name AS weight,
				products.stock,
				products.price,
				status.name AS status
			FROM 
				products
				LEFT JOIN type ON products.type_id = type.id
				LEFT JOIN status ON products.status_id = status.id
				LEFT JOIN weight ON products.weight_id = weight.id
			

		";
		$stmt = $this->pdo->query($sql);
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}


	public function addProduct($product) {
		$sql = "
			INSERT INTO products (
				type_id, 
				name, 
				image, 
				status_id
			) VALUES (
				:type_id, 
				:name, 
				:image, 
				:status_id
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($product);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}

	public function addProduct2($product) {
		$sql = "
			INSERT INTO products (
				type_id, 
				name, 
				weight_id,
				stock,
				price,
				image, 
				Products_Detail,
				status_id
				
			) VALUES (
				:type_id, 
				:name, 
				:weight_id,
				:stock,
				:price,
				:image, 
				:Products_Detail,
				:status_id
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($product);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
	//ตั้งต้น
	/*public function updateProduct($product) {
		$sql = "
			UPDATE  products SET 
				type_id = :type_id,
				name = :name, 
				image = :image, 
				status_id = :status_id
			WHERE id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($product);//จับคู่ รันในฐานข้อมูล
		return true;
	}*/
	public function updateProduct($product) {
		$sql = "
			UPDATE  products SET 
				type_id = :type_id,
				name = :name, 
				image = :image, 
				status_id = :status_id,
				stock = :stock,
				price = :price,
				weight_id = :weight_id
			WHERE id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($product);//จับคู่ รันในฐานข้อมูล
		return true;
	}
	public function updateProduct2($product) {
		$sql = "
			UPDATE  products SET 
				type_id = :type_id,
				name = :name, 
				image = :image, 
				status_id = :status_id,
				stock = :stock,
				price = :price,
				weight_id = :weight_id,
				Products_Detail = :Products_Detail
			WHERE id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($product);//จับคู่ รันในฐานข้อมูล
		return true;
	}


	public function deleteProduct($id) {
		$sql ="
			DELETE FROM products 
			WHERE id = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);
		echo 'บันทึกข้อมูลของท่านเรียบร้อย'.'<br>';
		return true;
	}

	public function getProductsById($id){
		$sql = "
			SELECT
				products.id,
				products.image,
				type.name AS type,
				products.name,
				weight.name AS weight,
				products.stock,
				products.Products_Detail,
				products.price,
				status.name AS status
			FROM 
				products
				LEFT JOIN type ON products.type_id = type.id
				LEFT JOIN status ON products.status_id = status.id
				LEFT JOIN weight ON products.weight_id = weight.id
			WHERE
				products.id = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);
		$data = $stmt->fetchAll();
		return $data[0];
		/* [0] ข้อมูลแค่คนแรก*/
	}
	//สำรอง
	public function getProductsById2($id){
		$sql = "
		SELECT
			products.id,
			products.image,
			type.name AS type,
			products.name,
			weight.name AS weight,
			products.stock,
			products.price,
			status.name AS status
		FROM 
			products
			LEFT JOIN type ON products.type_id = type.id
			LEFT JOIN status ON products.status_id = status.id
			LEFT JOIN weight ON products.weight_id = weight.id;	
		WHERE
			products.id = 12
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result[0];
		/* [0] ข้อมูลแค่คนแรก*/
	}
	public function showProduct() {
		$sql = "
		SELECT * FROM products
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$data = $stmt->fetchAll();/*ดึงข้อมูลออกมา*/
		return $data;
	}
	//mysqli_real_escape_string(connection, escapestring)
	public function escape_string() {
		
	}
}
?>