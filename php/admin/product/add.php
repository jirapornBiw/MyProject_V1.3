<?php require "../../../vendor/autoload.php"  ?>
<?php

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
    <title>เพิ่มข้อมูลสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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

                                    <div class="form-group mb-2">
                                        <label for="txt_file">รูปภาพสินค้า</label></br>
                                        <input type="file" name="txt_file" id="txt_file" class="form-contro" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <label for="type_id">ประเภทข้าว</label></br>
                                                <select name="type_id" class="form-control" style="width: 400px" required>
                                                    <option value="">เลือก</option>
                                                    <?php
                                                    $typeObj = new type;
                                                    $types = $typeObj->getAllTypes();
                                                    foreach ($types as $type) {
                                                        $selected = ($type['id'] == $product['type_id']) ? "selected" : "";
                                                        echo "
                                            <option value='{$type['id']}' {$selected} >{$type['name']}</option>
                                        ";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label for="weight_id">น้ำหนัก</label></br>
                                                <select name="weight_id" class="form-control" style="width: 400px" required>
                                                    <option value="">เลือก</option>
                                                    <?php
                                                    $weightObj = new weight;
                                                    $weights = $weightObj->getAllWeight();
                                                    foreach ($weights as $weight) {
                                                        $selected = ($weight['id'] == $product['weight_id']) ? "selected" : "";
                                                        echo "
                                    <option value='{$weight['id']}' {$selected} >{$weight['name']}</option>
                                ";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="price">ราคาที่จำหน่าย (บาท)</label></br>
                                                <input type="text" name="price" id="price" class="form-contro" style="width: 400px" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="Products_Detail">รายละเอียด</label></br>
                                                <textarea placeholder="กรุณากรอกรายละเอียด" style="width: 400px ;height:100px;" type="text" required name="Products_Detail" id="Products_Detail" class="form-contro"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <label for="name">ชื่อพันธุ์ข้าว</label></br>
                                                <input type="text" name="name" id="name" class="form-contro" required style="width: 400px">
                                            </div>

                                            <div class="form-group mb-2">
                                                <label for="stock">จำนวนในสต็อก (ถุง)</label></br>
                                                <input type="text" name="stock" id="stock" class="form-contro" required style="width: 400px">
                                            </div>

                                            <div class="form-group">
                                                <label for="status_id">สถานะการจำหน่าย</label></br>
                                                <select name="status_id" class="form-control" style="width: 400px" required>
                                                    <option value="">เลือก</option>
                                                    <?php
                                                    $statusObj = new status;
                                                    $statuses = $statusObj->getAllStatus();
                                                    foreach ($statuses as $status) {
                                                        $selected = ($status['id'] == $product['status_id']) ? "selected" : "";
                                                        echo "
                                    <option value='{$status['id']}' {$selected} >{$status['name']}</option>
                                ";
                                                    }
                                                    ?>
                                                </select></br>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-success" type="submid">บันทึก</button>
                                    <button class="btn btn-outline-danger" type="reset">ยกเลิก</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>