<?php
namespace App\Model;

use App\Database\Db;

class customer extends Db {

	public function createCustomer($customer) {

		$customer['password'] = password_hash($customer['password'], PASSWORD_DEFAULT);

		$sql = "
			INSERT INTO customers (
				first_name,
				last_name,
				email,
                address,
				provinces,
				amphures,
				districts,
                zip_code,
                username,
				password,
				phone
			) VALUES (
				:first_name,
				:last_name,
				:email,
                :address,
				:provinces,
				:amphures,
				:districts,
                :zip_code,
                :username,
				:password,
				:phone		
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($customer);

		session_start();
		$id = $this->pdo->lastInsertId();
		$_SESSION['c_id'] = $id;
		$_SESSION['c_name'] = $customer['first_name'];
		$_SESSION['c_email'] = $customer['email'];
        $_SESSION['c_address'] = $customer['address'];
		$_SESSION['c_districts'] = $customer['districts'];
		$_SESSION['c_amphures'] = $customer['amphures'];
		$_SESSION['c_provinces'] = $customer['provinces'];
        $_SESSION['c_zip_code'] = $customer['zip_code'];
		$_SESSION['c_username'] = $customer['username'];
		$_SESSION['userlevel'] = 'member';
		$_SESSION['login'] = true;
		$_SESSION['c_phone'] = $customer['phone'];

		return true;

	}

	public function checkCustomer($customer) {
		$sql = "
			SELECT
			*
			FROM
				customers
			WHERE
			customers.email = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$customer['email']]);
		$data = $stmt->fetchAll();
		$customerDB = $data[0];

		if(password_verify($customer['password'], $customerDB['password'])) {
			session_start();
			$_SESSION['c_id'] = $customerDB['id'];
			$_SESSION['c_name'] = $customerDB['first_name'];
			$_SESSION['c_email'] = $customerDB['email'];
			$_SESSION['c_address'] = $customerDB['address'];
			$_SESSION['c_districts'] = $customerDB['districts'];
			$_SESSION['c_amphures'] = $customerDB['amphures'];
			$_SESSION['c_provinces'] = $customerDB['provinces'];
			$_SESSION['c_zip_code'] = $customerDB['zip_code'];
			$_SESSION['c_username'] = $customerDB['username'];
			$_SESSION['userlevel'] = $customerDB['userlevel'];
			$_SESSION['login'] = true;	
			$_SESSION['c_phone'] = $customerDB['phone'];
			
			return true;
			return $data;
		} else {
			return false;
		}
	}
	
	public function getAllCustomer(){
        $sql = "
            SELECT * FROM customers
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
	public function getAllRole($id){
        $sql = "
            SELECT role
			FROM customers
			WHERE
				id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);
		$data = $stmt->fetchAll();
		return $data;
    }
	public function getCustomerById($id){
		$sql="
			SELECT 
			customers.*, 
			provinces.name_th as provinces,
			amphures.name_th as amphures,
			districts.name_th as districts
			FROM
				customers
			LEFT JOIN provinces ON customers.provinces = provinces.id
			LEFT JOIN amphures ON customers.amphures = amphures.id
			LEFT JOIN districts ON customers.districts = districts.id
			WHERE
				customers.id = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);
		$data = $stmt->fetchAll();
		return $data[0];
		
	}
	public function updateCustumer($customer){
		$sql = "
			UPDATE  customers SET
				first_name = :first_name, 
				last_name = :last_name,
				email = :email, 
				address = :address,
				provinces = :provinces,
				amphures = :amphures,
				districts = :districts,
				zip_code = :zip_code,
				phone = :phone,
				username = :username
			WHERE id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($customer);//จับคู่ รันในฐานข้อมูล

		session_start();
		$id = $this->pdo->lastInsertId();
		$_SESSION['c_name'] = $customer['first_name'];
		$_SESSION['c_email'] = $customer['email'];
        $_SESSION['c_address'] = $customer['address'];
		$_SESSION['c_districts'] = $customer['districts'];
		$_SESSION['c_amphures'] = $customer['amphures'];
		$_SESSION['c_provinces'] = $customer['provinces'];
        $_SESSION['c_zip_code'] = $customer['zip_code'];
		$_SESSION['c_username'] = $customer['username'];
		$_SESSION['userlevel'] = 'member';
		$_SESSION['login'] = true;
		$_SESSION['c_phone'] = $customer['phone'];
		return true;
	}
}
?>