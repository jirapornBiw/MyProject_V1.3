<?php require "../../../vendor/autoload.php" ;
use App\Model\trackings;
$trackingObj = new trackings;
$tracking = $_REQUEST;
$OrderId = $_REQUEST['OrderId'];
$customerID = $_REQUEST['customerID'];
$shipping_company = $_REQUEST['shipping_company'];
$tracking = $_REQUEST['tracking'];
include '../.././../src/Database/connect.php';  
mysqli_query($conn, "BEGIN"); 
$sql1 = "
			INSERT INTO trackings 
             VALUES (
				'$OrderId', 
				'$customerID', 
				'$shipping_company', 
				'$tracking'
			)
		";
		$result1 = mysqli_query($conn, $sql1);
header("location: index.php")
?>