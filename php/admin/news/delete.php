<?php require "../../../vendor/autoload.php";

use App\Model\news;
$newObj = new news;
$newObj->deleteNew($_REQUEST['id']);
header("location: index.php");
?>