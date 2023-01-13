<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\trackings;
$trackingObj = new trackings;;
$tracking = $_REQUEST;
$trackingObj->updateTracking($_REQUEST);

unset ($_REQUEST['company']);
echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';
header("location: index.php")
?>