<?php
namespace App\Model;

use App\Database\Db;

class news extends Db {
    public function getAllNew(){
        $sql = "
            SELECT 
				new_id,
				topic,
				CAST(dttm AS DATE) AS dttm,
				image,
				detail
			FROM news
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
	public function getAllNewTOP5(){
        $sql = "
            SELECT 
				new_id,
				topic,
				CAST(dttm AS DATE) AS dttm,
				image,
				detail
			FROM news
			ORDER BY new_id DESC
			LIMIT 5
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
                 CAST(dttm AS DATE) AS dttm,
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
    public function deleteNew($id) {
		$sql ="
			DELETE FROM news 
			WHERE New_Id = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);
		// echo 'บันทึกข้อมูลของท่านเรียบร้อย'.'<br>';
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