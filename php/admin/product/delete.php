<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\product;
$productObj = new product;;

    $product = $productObj->getProductsById($_REQUEST['id']);
    if( $product['image']){
        unlink('upload/'.$image_file.$product['image']);
    }
    $productObj->deleteProduct($_REQUEST['id']);
header("location: index.php");
?>