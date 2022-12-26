<?php
namespace App\Model;

use App\Database\Db;

class news extends Db {
    public function getAllNew(){
        $sql = "
            SELECT * FROM news
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getNewById($new_id){
		$sql = "
			SELECT
                 new_id,
                 topic,
                 detail,
                 dttm,
				 image
			FROM 
				news
			WHERE
			new_id = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$new_id]);
		$data = $stmt->fetchAll();
		return $data[0];
		/* [0] ข้อมูลแค่คนแรก*/
	}
    public function addNew($new) {
		$sql = "
			INSERT INTO news (
				topic, 
				detail, 
				image
				
			) VALUES (
				:topic, 
				:detail,
				:image
			)
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($new);//จับคู่ รันในฐานข้อมูล
		return $this->pdo->lastInsertId();
	}
    public function deleteNew($New_Id) {
		$sql ="
			DELETE FROM news 
			WHERE New_Id = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$New_Id]);
		echo 'บันทึกข้อมูลของท่านเรียบร้อย'.'<br>';
		return true;
	}
	public function updateNew($new) {
		$sql = "
			UPDATE  news SET 
				topic = :topic, 
				detail = :detail,
				image = :image
			WHERE new_id = :new_id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($new);//จับคู่ รันในฐานข้อมูล
		return true;
	}
}
    
?>