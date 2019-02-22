<?php
session_start();
//echo "Out of Service Thank you ";
//exit();
include("pathfile.php"); // ใช้ตอน  login action
$index_check='all';

//session_regenerate_id();
/*
// for set time out of user
if (!isset($_SESSION['timeout_idle'])) {
    $_SESSION['timeout_idle'] = time() + MAX_IDLE_TIME;
} else {
    if ($_SESSION['timeout_idle'] < time()) {
        //destroy session
    } else {
        $_SESSION['timeout_idle'] = time() + MAX_IDLE_TIME;
    }
}
*/
/*
// session ทั้งหมดที่ใช้
$_SESSION['user_id']
$_SESSION['user_type']
$_SESSION['firstname']
$_SESSION['lastname']
$_SESSION['username']
$_SESSION['token']
*/

//check login
if(isset($_POST['username']) and trim($_POST['username'])!='' and
   isset($_POST['password']) and trim($_POST['password'])!='' and
   isset($_POST['login_hidden']) and trim($_POST['login_hidden'])=='login'){
     //echo "if check login";
     //exit();
     $index_check="core_db_query_login"; // สำหรับ core_db_query_login เท่านั้น
     include("controllers/database/core_db_query_login.php");
     //query in database;
     // สร้าง session ขึ้นมา ที่ /controllers/database/core_db_query_login.php
     connect_db_check_login($_POST['username'],$_POST['password']);
     header("Location: $host");

}
// register
if( isset($_POST['firstname'])  and trim($_POST['firstname'])!='' and
    isset($_POST['lastname'])   and trim($_POST['lastname'])!='' and
    isset($_POST['age'])        and trim($_POST['age'])!='' and
    isset($_POST['gender'])     and trim($_POST['gender'])!='' and
    isset($_POST['username'])   and trim($_POST['username'])!='' and
    isset($_POST['password'])   and
    isset($_POST['email'])      and trim($_POST['email'])!='' and
    isset($_POST['tel'])        and trim($_POST['tel'])!='' and
    isset($_POST['status'])        and trim($_POST['status'])!='' and
    isset($_POST['regis_hidden']) and trim($_POST['regis_hidden'])=='regis'
  ){
    $index_check='regis';
    //echo "OK in this POST register<br>";
    //exit();
   include("controllers/database/guest/core/insert/register.php");
    //query in database;

    $regis_user=register(
      $_POST['firstname'],$_POST['lastname'],
      $_POST['age'],$_POST['gender'],
      $_POST['username'],$_POST['password'],
      $_POST['email'],$_POST['tel'],
      $_POST['status'],
      md5($_POST['password']));

    if($regis_user=="ok"){
      //กำหนด session ให้ และ refresh เพื่อ ให้เข้าไปใน if ล็อกอินแล้ว //กำหนด session ใน controllers/database/core_db_query_guest.php แล้ว
      // ในกรณี ที่ ไม่ได้มีการกำหนด session แต่ยัง return ok กลับมา ให้ทำการ ล้าง session แล้ว รีโหลด หน้าแรกไหม่
      if(!isset($_SESSION['user_id']) or !isset($_SESSION['firstname']) or !isset($_SESSION['lastname']) or !isset($_SESSION['username']) ){
        session_unset();
        session_destroy();
      }
    }else{
      // แสดงหน้า page error และข้อความ error พร้อม กับช่องทางติดต่อกับ dev
      include("views/addition/head_guest.php");
      echo "<br><br><br>";
      echo'<div class="notification is-danger">
            <strong>Error for register contact อ.สมิง โดย โด่ย ด้วน</strong>
          </div>';
      include("views/addition/footer.php");
      exit();
    }
    header("Location: $host");
}
//ยังไม่ได้ล็อกอิน
if(!isset($_SESSION['user_id']) or !isset($_SESSION['firstname']) or !isset($_SESSION['lastname']) or !isset($_SESSION['username']) ){
    session_unset();
    session_destroy();
    $index_check='nologin';
    include("views/addition/head_guest.php");
    include("views/homepage.php");
    include("views/addition/footer.php");
    exit();
}


// ล็อกอินแล้ว
if(isset($_SESSION['user_id']) and isset($_SESSION['firstname']) and isset($_SESSION['lastname']) and isset($_SESSION['username']) ){
    //echo $_SESSION['user_type'];
    //exit();
    // check username token ว่าตรงกับ db ไหม ถ้าใช่ ให้เช็กอีกว่า เป็น user หรือ admin
    // check ไว้ในกรณี ที่ ล็อกอินเข้าใช้งานแล้ว แต่เกิด user ใน ฐานข้อมูลDB หายไป user จะล็อกเอ้า
    //  index_check =='index' ป้องกันการเข้าถึงไฟลโดยตรง
    //$session_user_type_before = $_SESSION['user_type'];  เอาไว้ เช็ก ถ้าเกิดว่ามีการเปลี่ยน user type ให้ล็อกเอ้า
    //$index_check="core_db_query_login"; // สำหรับ core_db_query_login

    include("controllers/database/core_db_query_login.php");  // if (ล็อกอิน) ก็ include ไฟล์นี้เหมือนกัน
    $return_check_longin_finish = connect_db_check_stay_login($_SESSION['username'],$_SESSION['token']);

    /*
    if($session_user_type_before!=$_SESSION['user_type']){ // เอาไว้ถ้าเกิดว่า มีการเปลี่ยน user type ในขณะที่ล็อกอินอยู่ ให้ล็อกเอ้าออก
      include("logout.php");
    }*/

    if($return_check_longin_finish=="1"){
        if($_SESSION['user_type']==1){ // admin can add very thing  this function I don't do
              $index_check='user_type1';
              include("views/addition/head_admin.php");
              include("controllers/admin/admin.php");
              include("views/addition/footer.php");
              exit();
        }else if($_SESSION['user_type']==2){ // for user
              $index_check='user_type2';
              include("views/addition/head_user.php");
              include("controllers/user/user.php");
              include("views/addition/footer.php");
              exit();
        }else if($_SESSION['user_type']==3){ // for staff
              $index_check='user_type3';
              echo "user type 3";
              exit();
        }else{
              include("logout.php");
        }
    }
    include("logout.php");
}





?>
