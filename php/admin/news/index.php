<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\news;
session_start();
if(!$_SESSION['login']){
  header("location: ../../../auth/login.php");
  exit;
}
?>

<!DOCTYPE html>
<header class="header">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <?php include 'float.php'; ?>

  
  <div class="container-fluid">
		<div class="row">
			<div class="col ">
				<div class="card mb-3 ">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939;">
						<h4>ระบบจัดการข่าวสาร</h4>
						<a href="add.php?action=add" class="btn btn-outline-light">
						<i class="fa fa-plus-square-o" aria-hidden="true"></i>	
						เพิ่มข่าวสาร</a>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
								<th>รูปภาพ</th>
								<th>หัวข้อ</th>
								<th width="400">เนื้อหา</th>
								<th>วันที่</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$newsObj = new news();
									$news = $newsObj->getAllNew();
									$n=0;
									foreach($news as $new) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td><img src='{$new['image']}' width='200'  height='150' class='image_product'</td>
											<td>{$new['topic']}</td>
											<td>{$new['detail']}</td>
											<td>{$new['dttm']}</td>
											<td>
												<a href='edit.php?id={$new['new_id']}&action=edit' class='btn btn-outline-warning'>แก้ไข</a>
												<a href='delete.php?id={$new['new_id']}' class='btn btn-outline-danger'>ลบ</a>
											</td>
										</tr>
										";
										}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</article>
</body>
</html>