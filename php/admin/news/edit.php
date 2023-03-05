<?php require "../../../vendor/autoload.php";

use App\Model\news;

session_start();

if (isset($_REQUEST['action']) == 'edit') {
    $newObj = new news;
    $new = $newObj->getNewById($_REQUEST['id']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>แก้ไขข้อมูลข่าวสาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type href="../style-main-admin.css">
</head>

<body class="font-mali">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <div class="row">
        <div class="col-lg-2">
            <?php include '../float.php'; ?>

        </div>
        <div class="col-lg-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-header text-white d-flex justify-content-between align-items-center">
                                <h4 class="text-light">เพิ่มข้อมูลสินค้า</h4>
                                <a href="index.php" class="btn btn-outline-light">ย้อนกลับ</a>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <form action="save_add.php?action=add" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="txt_file">ที่อยู่รูปภาพ</label></br>
                                                <input type="file" name="txt_file" id="txt_file" class="form-contro">
                                                <input type="hidden" name="image" id="txt_file" class="form-contro" value="<?php echo $new['image']; ?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label for="topic">หัวข้อข่าวสาร</label></br>
                                                <input type="text" name="topic" id="topic" class="form-control" style="width: 400px;" value="<?php echo $new['topic']; ?>" required>
                                            </div></br>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <label for="Products_Detail">เนื้อหาข่าวสาร (จำกัด 5000 ตัวอักษร)</label></br>
                                                <textarea placeholder="" style="width: 400px ;height:300px;" type="text" name="Products_Detail" id="Products_Detail" class="form-contro" required><?php echo $new['detail']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-success" type="submid">บันทึก</button>
                                    <button class="btn btn-outline-danger" type="reset">ยกเลิก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php include 'float.php'; ?>
  <div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939;">
                    <h4 class="text-light">แก้ไขข้อมูลข่าวสาร</h4>
						<a href="index.php" class="btn btn-outline-light">ย้อนกลับ</a>
					</div>
					<div class="card-body">
                        <form action="save_edit.php" method="post"
                        enctype="multipart/form-data">
                        
                        
                        </br>
                        <input type="hidden" name="new_id" value="<?php echo $_REQUEST['id'] ?>">
                    <div class="form-group">
                        <label for="topic">หัวข้อข่าวสาร</label></br>
                        <input type="text" name="topic" id="topic" class="form-control" style="width: 400px;" 
                        value="<?php echo $new['topic']; ?>">
                    </div></br>
                    <div class="form-group">
                        <label for="detail">เนื้อหาข่าวสาร</label></br>
                        <input type="text" name="detail" id="detail" class="form-control"  style="width: 400px;"
                        value="<?php echo $new['detail']; ?>">
                    </div></br>
                    <div class="form-group">
                    <label for="txt_file">ที่อยู่รูปภาพ</label></br>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                        <input type="hidden" name="image" id="txt_file" class="form-contro"
                        value="<?php echo $new['image']; ?>">
                    
                    </div></br>
                    <button class="btn btn-success" type ="submid">บันทึก</button>
			        <button class="btn btn-outline-danger" type ="reset">ยกเลิก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
</body>

</html>