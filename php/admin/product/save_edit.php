<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\product;
$productObj = new product;

if($_FILES['txt_file']['tmp_name']){
    $image_file = $_FILES['txt_file']['name'];
    $type = $_FILES['txt_file']['type'];
    $size = $_FILES['txt_file']['size'];
    $temp = $_FILES['txt_file']['tmp_name'];

    $path = "upload/" . $image_file;

    move_uploaded_file($temp, 'upload/'.$image_file);

}

$product = $_REQUEST;

if($_FILES['txt_file']['tmp_name']){
    if($product['image']){
        //ลบรูปเก่า หากมีการแก้ไข
    unlink('upload/'.$image_file.$product['image']);
    }
    $product['image'] = $path;
}
$productObj->updateProduct($product);

header("location: index.php");
?>