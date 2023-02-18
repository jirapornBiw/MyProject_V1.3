<?php require "../../../vendor/autoload.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลข่าวสาร</title>
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
			<div class="col">
				<div class="card mb-3">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939">
						<h4 class="text-light">เพิ่มข้อมูลข่าวสาร</h4>
						<a href="index.php" class="btn btn-light">ย้อนกลับ</a>
					</div>
					<div class="card-body">
                        <form action="save_add.php?action=add" method="post"
                        enctype="multipart/form-data">
                        
                        </br>
                    <div class="form-group">
                        <label for="topic">หัวข้อข่าวสาร</label></br>
                        <input type="text" name="topic" id="topic" class="form-contro" style="width: 400px;">
                    </div></br>

                    <div class="form-group">
                        <label for="detail">เนื้อหาข่าวสาร</label></br>
                        <textarea placeholder="กรุณากรอกรายละเอียด"style="width: 400px;height:300px;"type="text" name="detail" id="detail" class="form-contro"></textarea>
                    </div></br>

                    <div class="form-group">
                        <label for="txt_file">ที่อยู่รูปภาพ</label></br>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                    </div></br>
                    <button class="btn btn-success" type ="submid">บันทึก</button>
			        <button class="btn btn-outline-danger" type ="reset">ยกเลิก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>