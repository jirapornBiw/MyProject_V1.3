<?php require "../../../vendor/autoload.php";
use App\Model\trackings;
use App\Model\orders;
$trackingObj = new trackings;
$ordersObj = new orders;
echo '<pre>';
print_r($_REQUEST);
echo '<pre>'; 
$tracking = $_REQUEST;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $trackingObj->updateTracking($tracking);
}

unset ($_REQUEST['company']);
unset ($_REQUEST['tracking']);

$tracking = $_REQUEST;
$ordersObj->updateOrderTrackingClaimAdmin($tracking);
echo "<script>alert('อัพเดตสถานะใหม่สำเร็จ');
window.location='..order/index.php';</script>";

// header("location: index.php")
?>