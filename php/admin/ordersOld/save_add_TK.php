<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\orders;
$orderObj = new orders;;



    $order = $_REQUEST;
    $orderObj->addNewTK($order);

header("location: index.php");
?>