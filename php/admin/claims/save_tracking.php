<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\trackings;
$trackingObj = new trackings;;
$tracking = $_REQUEST;
$trackingObj->updateTracking($_REQUEST);

header("location: index.php")
?>