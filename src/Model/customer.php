<?php
namespace App\Model;

use App\Database\Db;

class customer extends Db {

	public function createCustomer($customer) {

		$customer['password'] = password_hash($customer['password'], PASSWORD_DEFAULT);

		$sql = "
			INSERT INTO customers (
				name,
				email,
                address,
                postcode,
                username,
				password,
				phone
			) VALUES (
				:name,
				:email,
                :address,
                :postcode,
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
		$_SESSION['c_name'] = $customer['name'];
		$_SESSION['c_email'] = $customer['email'];
        $_SESSION['c_address'] = $customer['address'];
        $_SESSION['c_postcode'] = $customer['postcode'];
		$_SESSION['c_username'] = $customer['username'];
		$_SESSION['userlevel'] = 'member';
		$_SESSION['login'] = true;
		$_SESSION['c_phone'] = $customer['phone'];

		return true;

	}

	public function checkCustomer($customer) {
		$sql = "
			SELECT
				id,
				name,
				email,
				address,
				postcode,
				username,
				password,
				userlevel,
				phone
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
			$_SESSION['c_name'] = $customerDB['name'];
			$_SESSION['c_email'] = $customerDB['email'];
			$_SESSION['c_address'] = $customerDB['address'];
			$_SESSION['c_postcode'] = $customerDB['postcode'];
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
				customers.id,
				customers.name,
				customers.email,
				customers.address,
				customers.postcode,
				customers.username,
				customers.phone
			FROM
				customers
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
				name = :name, 
				email = :email, 
				address = :address,
				postcode = :postcode,
				username = :username,
				phone = :phone
			WHERE id = :id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($customer);//จับคู่ รันในฐานข้อมูล
		return true;
	}
}
?>