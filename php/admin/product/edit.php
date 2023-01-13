<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\product;
use App\Model\type;
use App\Model\status;
use App\Model\weight;

session_start();

if(isset($_REQUEST['action'])=='edit'){
	$productObj = new product;
	$product = $productObj->getProductsById($_REQUEST['id']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสินค้า</title>
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
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939;">
                        <h4 class="text-light">แก้ไขข้อมูลสินค้า</h4>
					</div>
					<div class="card-body">
                        <form action="save_edit.php" method="post"enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
                            <div class="form-group mb-2">
                                <label for="type_id">ประเภทข้าว</label></br>
						        <select name="type_id" class="form-control" style="width: 400px;">
                                    <option value=""><?php echo $product['type']; ?></option>
                                    <?php
                                        $typeObj = new type;
                                        $types = $typeObj->getAllTypes();
                                        foreach($types as $type) {
                                        $selected = ($type['id'] == $product['type_id']) ? "selected" : "";
                                        echo "
                                            <option value='{$type['id']}' {$selected} >{$type['name']}</option>
                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                          
                            <div class="form-group mb-2">
                                <label for="name">ชื่อพันธุ์ข้าว</label></br>
                                <input type="text" name="name" id="name" class="form-control" style="width: 400px;"
                                value="<?php echo $product['name']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="txt_file">ที่อยู่รูปภาพ</label></br>
                                <input type="file" name="txt_file" id="txt_file" class="form-contro">
                                <input type="hidden" name="image" id="txt_file" class="form-contro"
                                value="<?php echo $product['image']; ?>">
                            
                            </div>

                            <div class="form-group mb-2">				
                                <label for="weight_id">น้ำหนัก</label></br>
                                <select name="weight_id" class="form-control" style="width: 400px;">
                                    <option value=""><?php echo $product['weight']; ?></option>
                                    <?php
                                        $weightObj = new weight;
                                        $weights = $weightObj->getAllWeight();
                                        foreach($weights as $weight) {
                                        $selected = ($weight['id'] == $product['weight_id']) ? "selected" : "";
                                        echo "
                                            <option value='{$weight['id']}' {$selected} >{$weight['name']}</option>
                                        ";
                                        }
                                    ?>
                                </select>         
                            </div>

                            <div class="form-group mb-2">
                                <label for="stock">จำนวนในสต็อก (ถุง)</label></br>
                                <input type="text" name="stock" id="stock" class="form-contro"  style="width: 400px;"
                                value="<?php echo $product['stock']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="price">ราคาที่จำหน่าย (บาท)</label></br>
                                <input type="text" name="price" id="price" class="form-contro" style="width: 400px;"
                                value="<?php echo $product['price'];?>">
                            </div>
                        
                            <div class="form-group mb-2">
                                <label for="Products_Detail">รายละเอียด</label></br>
                                <textarea placeholder=""style="width: 400px ;height:100px;" type="text" name="Products_Detail" id="Products_Detail" class="form-contro"><?php echo $product['Products_Detail'];?></textarea>
                            </div>

                            <div class="form-group mt-2">				
                                <label for="status_id">สถานะการจำหน่าย</label></br>
                                <select name="status_id" class="form-control" style="width: 400px;">
                                    <option value=""><?php echo $product['status'];?></option>
                                    <?php
                                        $statusObj = new status;
                                        $statuses = $statusObj->getAllStatus();
                                        foreach($statuses as $status) {
                                        $selected = ($status['id'] == $product['status_id']) ? "selected" : "";
                                        echo "
                                            <option value='{$status['id']}' {$selected} >{$status['name']}</option>
                                        ";
                                        }
                                    ?>
                                </select></br>
                            </div>
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