<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\pays;
use App\Model\orders;
$payObj = new pays;
$payObj2 = new pays;
$statusObj = new pays;

/*echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';
$path = "upload/" . $image_file;

move_uploaded_file($temp, 'upload/'.$image_file);
*/

$image_file = $_FILES['txt_file']['name'];
$type = $_FILES['txt_file']['type'];
$size = $_FILES['txt_file']['size'];
$temp = $_FILES['txt_file']['tmp_name'];

$path = "" . $image_file;

move_uploaded_file($temp, '../admin/pays/upload/'.$image_file);

    $pay = $_REQUEST;
    unset($pay['action']);
    unset($pay['new_id']);
    $pay['image'] = $path;
    $payObj->addPay($pay);

    //$pay2 = $_REQUEST['OrderId'];
    //$payObj->updateStatusCorrect($pay);
    //$payObj->updateStatusCorrect($pay);

//exit;

unset($_REQUEST['CustomerID']);

//echo $_REQUEST['OrderId'];
    $pay2 = $_REQUEST;
    $payObj2->updateStatusCorrect($pay2);
header("location: orders.php");
?>