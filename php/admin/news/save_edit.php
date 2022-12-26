<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\news;
$newObj = new news;

if($_FILES['txt_file']['tmp_name']){
    $image_file = $_FILES['txt_file']['name'];
    $type = $_FILES['txt_file']['type'];
    $size = $_FILES['txt_file']['size'];
    $temp = $_FILES['txt_file']['tmp_name'];

    $path = "upload/" . $image_file;

    move_uploaded_file($temp, 'upload/'.$image_file);

}

$new = $_REQUEST;

if($_FILES['txt_file']['tmp_name']){
    if($new['image']){
        //ลบรูปเก่า
    unlink('upload/'.$image_file.$new['image']);
    }
    $new['image'] = $path;
}
$newObj->updateNew($new);

header("location: index.php");
?>