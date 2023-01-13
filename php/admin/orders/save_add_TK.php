<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\trackings;
use App\Model\orders;
$trackingsObj = new trackings;;
$ordersObj = new orders;;

echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';

    $trackings = $_REQUEST;
    $trackingsObj->addTracking($_REQUEST);

unset ($_REQUEST['shipping_company']);
echo '<hr>';
echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';

    $orders = $_REQUEST;
    $ordersObj->updateOrderTrackingTest($orders);
header("location: index.php");
?>