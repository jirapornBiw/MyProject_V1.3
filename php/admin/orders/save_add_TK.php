<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\trackings;
use App\Model\orders;
$trackingsObj = new trackings;
$ordersObj = new orders;

    $trackings = $_REQUEST;
    $trackingsObj->addTracking($_REQUEST);

unset ($_REQUEST['shipping_company']);

    $orders = $_REQUEST;
    $ordersObj->updateOrderTrackingTest($orders);
header("location: index.php");
?>