<?php require "../../../vendor/autoload.php";

use App\Model\product;
$productObj = new product;;

$image_file = $_FILES['txt_file']['name'];
$type = $_FILES['txt_file']['type'];
$size = $_FILES['txt_file']['size'];
$temp = $_FILES['txt_file']['tmp_name'];

$path = "upload/" . $image_file;

move_uploaded_file($temp, 'upload/'.$image_file);

    $product = $_REQUEST;
    unset($product['action']);
    unset($product['id']);
    $product['image'] = $path;
    $productObj->addProduct2($product);

header("location: index.php");
?>