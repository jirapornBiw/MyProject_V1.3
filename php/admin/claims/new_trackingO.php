<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\customers;
use App\Model\products;
use App\Model\type;
use App\Model\status;
use App\Model\weight;

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มหมายเลขการจัดส่งใหม่</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<?php include '../float.php'; ?>
  <div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939">
						<h4>เพิ่มหมายเลขการจัดส่งใหม่</h4>
						<a href="index.php" class="btn btn-light">ย้อนกลับ</a>
					</div>
					<div class="card-body">
                        <form action="save_tracking.php" method="post"
                        enctype="multipart/form-data">
                        
                        </br>


                    <input type="hidden" name="OrderId" value="<?php echo $_REQUEST['id']?>">
                    <div class="form-group">
                    <label for="company">บริษัทที่ทำการจัดส่ง</label></br>
                    <input type="text" name="company" id="company" class="form-contro" >
                    </div></br> 
                    
                    <div class="form-group">
                    <label for="tracking">เลขพัสดุใหม่</label></br>
                    <input type="text" name="tracking" id="tracking" class="form-contro" >
                    </div></br>
                    <button class="btn btn-success" type ="submid">บันทึก</button>
			        <button class="btn btn-danger" type ="reset">ยกเลิก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>