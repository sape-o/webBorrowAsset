<?php
// core_db_insert_addasset_admin.php  เป็นไฟล์เอาไว้ insert data by admin
/*
 * function insert_brand_asset_admin() เอาไว้ insert brand ** function return "true" or "false" **
 *
 * function insert_generation_asset_admin() เอาไว้ insert generation ** function return "true" or "false" **
 *
 * function insert_type_admin() เอาไว้ insert type ** function return "true" or "false" **
 *
 * function insert_nature_admin เอาไว้ insert nature ** function return "true" or "false" **
 *
 * function insert_asset_admin() เอาไว้ insert asset ** function return "true" or "false" **
 */

/* เอาไว้ดัก ถ้าเกิดว่า มีคนเข้าผ่านลิ้งนี้โดยตรงเช่น  server.com/addition/head_admin.php มันจะแสดงว่าไม่มีไฟลนี้ (ทั้งๆที่มี)
 * จะสามารถ รันไฟล นี้ได้ก็ต่อเมื่อ เข้าผ่าน index.php และ และ index.php เรียกใช้ไฟล นี้เท่านั้น
 */

  if($index_check!='user_type1'){
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/controllers/database/admin/core/insert/addasset.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }


  include("controllers/database/config/core_db_pass.php");

 // admin insert brand in add asset page
function insert_brand_asset_admin($brand) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $brand = trim($brand);
    // select มันออกมาก่อน ในกรณีที่ มีการยิงเข้ารัวๆ หรือ กด refresh ซ้ำ ถึงแม้ว่าจะ insert ข้อมูลไม่ได้ แต่จะทำให้ มันเกิด action auto เพิ่ม id ใน DB
    $insert_brand = "INSERT INTO brand (brand_name,picture)
                      VALUES ('$brand', NULL);";
    if ($handle->query($insert_brand) === FALSE){
      echo "Error: " . $insert_brand . "<br>" . $handle->error;
      $handle->close();
    }else{
      $handle->close();
      return "finish";
    }
  }
}
// admin insert generation
function insert_generation_asset_admin($brand_id,$generation){
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $brand_id = trim($brand_id);
    $generation = trim($generation);
    // select มันออกมาก่อน ในกรณีที่ มีการยิงเข้ารัวๆ หรือ กด refresh ซ้ำ ถึงแม้ว่าจะ insert ข้อมูลไม่ได้ แต่จะทำให้ มันเกิด action auto เพิ่ม id ใน DB
    $insert_generation = "INSERT INTO generation (generation_name,brand_id) VALUES ('$generation', '$brand_id')";
    if ($handle->query($insert_generation) === FALSE){
      echo "Error: " . $insert_generation . "<br>" . $handle->error;
      $handle->close();
    }else{
      $handle->close();
      return "finish";
    }
  }
}
// admin insert type
function insert_type_admin($type) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $type = trim($type);
    // select มันออกมาก่อน ในกรณีที่ มีการยิงเข้ารัวๆ หรือ กด refresh ซ้ำ ถึงแม้ว่าจะ insert ข้อมูลไม่ได้ แต่จะทำให้ มันเกิด action auto เพิ่ม id ใน DB
    $insert_type = "INSERT INTO type (type_name) VALUES('$type')";
    if ($handle->query($insert_type) === FALSE){
      echo "Error: " . $insert_type . "<br>" . $handle->error;
      $handle->close();
    }else{
      $handle->close();
      return "finish";
    }
  }

}
// admin insert nature
function insert_nature_admin($type_id,$nature_name) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $type_id = trim($type_id);
    $nature_name = trim($nature_name);
    // select มันออกมาก่อน ในกรณีที่ มีการยิงเข้ารัวๆ หรือ กด refresh ซ้ำ ถึงแม้ว่าจะ insert ข้อมูลไม่ได้ แต่จะทำให้ มันเกิด action auto เพิ่ม id ใน DB
    $insert_nature = "INSERT INTO nature (nature_name,type_id) VALUES ('$nature_name','$type_id')";
    if ($handle->query($insert_nature) === FALSE){
      echo "Error: " . $insert_nature . "<br>" . $handle->error;
      $handle->close();
    }else{
      $handle->close();
      return "finish";
    }
  }
}
// admin insert asset
function insert_asset_admin($serial,$keeper,$generation,$nature,$sn,$location,
                            $date,$status) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $serial = trim($serial);
    $keeper = trim($keeper);
    $status = trim($status);
    $sn = trim($sn);
    $generation_id = trim($generation);
    $nature_id = trim($nature);

    $insert_asset = "INSERT INTO asset (serial,
                                        keeper,
                                        status,
                                        sn,
                                        location,
                                        acquired_date,
                                        generation_id,
                                        nature_id)
    VALUES ('$serial','$keeper','$status','$sn','$location',
            '$date','$generation_id','$nature_id')";

    if ($handle->query($insert_asset) === FALSE){
      echo "Error: " . $insert_asset . "<br>" . $handle->error;
      $handle->close();
    }else{
      $handle->close();
      return "finish";
    }


  }

}

 ?>
