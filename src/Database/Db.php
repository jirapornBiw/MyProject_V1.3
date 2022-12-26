<?php

namespace App\Database;

use PDO; 
class Db {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $dbName = "myproject";

	protected $pdo;//รอรับobject
	//Generate password : vd6(fAr9Cw.G2s1f
	function __construct() {//ทำงานทันทีเมื่อมีการสร้างobject
		$this->pdo = $this->connect();
	}

	

	protected function connect() {
		$dsn = "mysql:host={$this->host};dbname={$this->dbName}";
		$pdo = new PDO($dsn, $this->user, $this->password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
	
}

?>