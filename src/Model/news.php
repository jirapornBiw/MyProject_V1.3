<?php
namespace App\Model;

use App\Database\Db;

class news extends Db {
    public function getAllNew(){
        $sql = "
            SELECT 
				NewID AS new_id,
				Topic AS topic,
				CAST(dttm AS DATE) AS dttm,
				image,
				Detail AS detail
			FROM news
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
	public function getAllNewTOP5(){
        $sql = "
            SELECT 
				NewID AS new_id,
				Topic AS topic,
				CAST(dttm AS DATE) AS dttm,
				image,
				Detail AS detail
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
                 NewID AS new_id,
                 Topic AS topic,
                 detail,
                 CAST(dttm AS DATE) AS dttm,
				 image
			FROM 
				news
			WHERE
			NewID = ?
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
				Topic, 
				Detail, 
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
			WHERE NewID = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);
		// echo 'บันทึกข้อมูลของท่านเรียบร้อย'.'<br>';
		return true;
	}
	public function updateNew($new) {
		$sql = "
			UPDATE  news SET 
				Topic = :topic, 
				Detail = :detail,
				image = :image
			WHERE NewID = :new_id
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($new);//จับคู่ รันในฐานข้อมูล
		return true;
	}
}
    
?>