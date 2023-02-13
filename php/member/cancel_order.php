
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>
<body>

<?php require "../../vendor/autoload.php" ;
session_start();
use App\Model\orders;

//if(isset(($_REQUEST)['action']='cancel')){
    if(isset($_REQUEST['action'])){
    alert("ยกเลิกออเดอร์แล้วเรียบร้อย");
        unset($_REQUEST['action']); 
            $ordersObj = new orders;;
            $orders = $_REQUEST;
            $ordersObj->updateOrderStatusCancel($_REQUEST);
        }
    else{
    alert("ยกเลิกออเดอร์ไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ"); 
    unset($_REQUEST['action']); 
    }
    

function alert($msg) {
    echo "<script type='text/javascript'>
    alert('$msg');
    window.location ='orders.php?id=<?php echo {$_SESSION['c_id']}?>&action=detail';
    </script>";
    //header("location: orders.php?id={$_SESSION['id']}&action=show");

}
//
?>
</body>
</html>

