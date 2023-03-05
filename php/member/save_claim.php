<?php require "../../vendor/autoload.php";

use App\Model\claims;
use App\Model\orders;

$claimObj = new claims;
$ordersObj = new orders;
// $image_file = $_FILES['txt_file']['name'];
// $type = $_FILES['txt_file']['type'];
// $size = $_FILES['txt_file']['size'];
// $temp = $_FILES['txt_file']['tmp_name'];

// $path = "" . $image_file;

// move_uploaded_file($temp, '../admin/claims/upload/'.$image_file);

$name = $_FILES['video']['name']; //-56375.mp4
$type = explode(".", $name); //mp4
$type = end($type);
$ran_name = rand();
$temp = $_FILES['video']['tmp_name'];//สร้างที่เก็บข้อมูลช่วคราว C:\xampp\tmp\phpFA55.tmp
if ($type = 'mp4' && $type = 'MP4') {
    // $url = '../admin/claims/upload/' . $ran_name . $name;
    $url = "../admin/claims/upload/" . $ran_name . $name;
    move_uploaded_file($temp, '../admin/claims/upload/'. $ran_name . $name); //ย้ายวิดิโอไปไว้ที่เก็บไฟล์
    $claim = $_REQUEST;

    //unset($claim['action']);
    //unset($claim['new_id']);

    $claim['url'] = $url;
    $claimObj->addClaim($claim);

    unset ($_REQUEST['CustomerID']);
    unset ($_REQUEST['details']);

    $orders = $_REQUEST;
    $ordersObj->updateOrderTrackingClaim($orders);
    echo "<script>alert('แจ้งพัสดุเสียหายเรียบร้อยแล้ กรุณารอการตรวจสอบจากเจ้าหน้าที่ค่ะ');
    window.location='orders.php';</script>";
      
}else if ($type == 'png' || $type = 'jpg') { //ตรวจสอบนามสกุลไฟล์ mp4
    echo "กรุณาแนบไฟล์ mp4 เท่านั้น";
}

//header("location: index.php");
