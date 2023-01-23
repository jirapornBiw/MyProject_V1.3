<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\orders;

echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';


$ordersObj = new orders;;
$orders = $_REQUEST;
$ordersObj->updateOrderStatusCancel($_REQUEST);




header("location: orders.php?id={$_SESSION['id']}&action=show")
?>