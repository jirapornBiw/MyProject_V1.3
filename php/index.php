<!-- หน้าหลัก -->
<?php require "../vendor/autoload.php";

//ตรวจสอบการlogin
session_start();
if(!$_SESSION['login']){
  header("location: ../auth/login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- เชื่อมต่อ Bootstrap ตามที่อยู่ -->
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!-- เชื่อมต่อ css ตามตามที่อยู่ -->
    <link rel="stylesheet" type="text/css" href="StyleMember.css">

  </head>
<body>
  <!--  -->
  <!-- แถบเมนูบาร์ด้านบน -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #116530">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="#">ข้าวหอมใหม่</a>
      <!-- เมื่อมีการย่อขนาดหน้าจอลดลง จะมีปุ่มกดแสดงให้เห็น -->
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- ไอคอน 3 ขีด -->
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">
            <i class="fa fa-home text-light" aria-hidden="true"></i>
            หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="../auth/login.php">
            <i class="fa fa-sign-in text-light" aria-hidden="true"></i>
              เข้าสู่ระบบ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light " aria-current="page" href="../auth/register.php">
            <i class="fa fa-user-plus text-light" aria-hidden="true"></i>
            สมัครสมาชิก</a>
          </li>
          <!-- เมนูที่ไม่สามารถกดได้ -->
          <li class="nav-item">
            
            <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">
            <i class="fa fa-phone-square text-light" aria-hidden="true"></i>
            โทร 095-395-4854</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">
            <i class="fa fa-clock-o" aria-hidden="true"></i>  
            เวลาทำการ จันทร์-ศุกร์ 09:00-15:00</a>
            
          </li>
        </ul>

        <!-- ช่องสำหรับค้นหา -->
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-warning text-light" type="submit">Search</button>
        </form>

        </div>
      </div>
    </nav><!-- สิ้นสุดแถบค้นหา -->

    <!-- รูปภาพสำหรับแสดง -->
    <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <!-- การสร้าง Carousel -->
                    <div class="carousel slide" id="slider1" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <button  data-bs-target="#slider1" data-bs-slide-to="0"></button>
                                <button  data-bs-target="#slider1" data-bs-slide-to="1"></button>
                                <button  class="active" data-bs-target="#slider1" data-bs-slide-to="2"></button>
                                
                            </ol>
                            <!-- รูปที่ 1 -->
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/a7/1d/68/a71d682cdc2a85d50e577070c7ebd534.jpg" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>จำหน่ายข้าวไทย</h3>
                                        <p>จำหน่ายข้าวไทย ถุง/กระสอบ ทั้งปลีก-ส่ง ราคาพิเศษ ติดต่อ 095-395-4854</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://1.bp.blogspot.com/-uLM3yr6SKxA/Vk04kEOh6SI/AAAAAAAAcGc/QMh3-IDuwiE/s1600/DSC08984.JPG" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>ข้าวอินทรีย์ </h3>
                                        <p>ไม่ใส่สารเคมี และสารพิษ ในการเพาะปลูกทุกขั้นตอน</p>
                                    </div>
                                </div>
                                <div class="carousel-item active">
                                    <img src="https://i0.wp.com/www.xinhuathai.com/wp-content/uploads/2021/06/Asia-Album_-Nepal-marks-National-Paddy-Day-2.jpg?resize=696%2C475&ssl=1" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>ปลูก เก็บเกี่ยว บรรจุเองทุกขั้นตอน</h3>
                                        <p>จัดทำโดยครอบครัวภายในหมู่บ้าน</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ควบคุมการ Slide ผ่านปุ่ม -->
                            <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slider1">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slider1">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                  </div>
              </div>
          </div>
      </div><!-- สิ้นสุดรูปภาพ -->
    
      <div class="container mt-4">
        <h2 style="color: #116530">เกี่ยวกับเรา</h2>
        <p>
        ในชุมชน ต.หาดสองแคว อ.ตรอน จ.อุตรดิตถ์ ประชาชนส่วนใหญ่ประกอบอาชีพเกษตรกรรมทำนา เป็นอาชีพหลัก การประกอบอาชีพเกษตรกรรม ที่ผ่านมา
        ประสบกับปัญหานานับการ ปัญหาปุ๋ยและยาฆ่าแมลงที่มีราคาแพง รายได้จากการจำหน่ายผลผลิต หลังหักค่าใช้จ่ายแล้วแทบไม่เหลือ ทำให้เกษตรกรประสบภาวะขาด
        ทุนทุกปี หลายฝ่ายต่างมีความคิดที่จะให้เกษตรกรหันหน้าเข้ามาปรึกษา พูดคุยกัน ถึงปัญหาในการผลิต ซึ่งเกษตรกรจะต้องช่วยเหลือตนเอง โดยการปรับเปลี่ยน
        กระบวนการหรือกลไกในการผลิตตามแนวทางเศรษฐกิจพอเพียงของพระบาทสมเด็จพระเจ้าอยู่หัวฯ เกี่ยวกับการพึ่งพาตนเอง ซึ่งองค์การบริหารส่วนตำบลหาดสองแคว
        ได้มีการกำหนดยุทธศาสตร์การพัฒนาอย่างเป็นระบบจากยุทธศาสตร์การพัฒนาตำบลน่าอยู่สู่เศรษฐกิจพอเพียงสู่กิจกรรมโครงการลดต้นทุน ที่เน้นการพึ่งพาตนเอง
        ที่ผ่านมาองค์การบริหารส่วนตำบลหาดสองแคว ได้ดำเนินการตามยุทธศาสตร์การพัฒนาธรรมชาติและสิ่งแวดล้อมให้มีดุลยภาพที่ยั่งยืน จัดอบรมการเกษตรก้าวไกล
        และศึกษาดูงานให้แก่กลุ่มเกษตรกรทำนาเพื่อศึกษาแบบและวิถีการดำรงชีวิตของกลุ่มเกษตรกรทำนา ตามแนวทางเกษตรอินทรีย์ ศึกษาการคัดเลือกเมล็ดพันธุ์ข้าว
        การป้องกันโรคและศัตรูข้าว รวมถึงกระบวนการเรียนรู้ร่วมกัน เพื่อนำความรู้ประสบการณ์ แนวทางแก้ไขปัญหาและบทสรุป อันจะนำไปสู่การแก้ไขปัญหาทางการเกษตร
        ลดต้นทุนการผลิตได้อย่างยั่งยืน
        </p>
      </div>


      <!-- เชื่อมต่อjs ตามที่อยู่ -->
      <script src="../node_modules/jquery/dist/jquery.min.js"></script>
      <script src="../node_modules/popper.js/dist/popper.min.js"></script>
      <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  </body>
</html>