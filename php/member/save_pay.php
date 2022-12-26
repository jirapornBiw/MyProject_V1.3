<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\pays;
use App\Model\orders;
$payObj = new pays;
$statusObj = new pays;

$image_file = $_FILES['txt_file']['name'];
$type = $_FILES['txt_file']['type'];
$size = $_FILES['txt_file']['size'];
$temp = $_FILES['txt_file']['tmp_name'];

$path = "" . $image_file;

move_uploaded_file($temp, 'upload/'.$image_file);

    $pay = $_REQUEST;
    unset($pay['action']);
    unset($pay['new_id']);
    $pay['image'] = $path;
    $payObj->addPay($pay);

    //$payObj->updateStatusCorrect($pay);

    

header("location: orders.php");
?>