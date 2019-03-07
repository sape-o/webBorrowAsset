<?php
// core_api_admin_add_aset.php
// controllers/admin/api/query_asset.php จะเป็นตัวรับ แล้วส่งมาที่นี่

/* function query_check_brand ** function echo "true" and "false" **
 * function query_check_generation ** function echo "true" and "false" **
 * function query_check_type ** function echo "true" and "false" **
 * function query_check_nature ** function echo "true" and "false" **
 *  ตัวรับ POST จะอยู่ด้านล่างสุด
 *
 */

 // เข้าลิ้งนี้โดยตรง โดยที่ไม่ได้ POST อะไรมาเลยจะเข้าไม่ได้ ยกเว้นใช้ postman postเขามา
 // หรือ ถ้าไม่มีไฟล์ core_db_pass.php มันก็จะไม่ทำงาน
if(!file_exists("../../database/config/core_db_pass.php") ){
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/admin/api/query/check_asset.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/config/core_db_pass.php");
function query_check_brand($brand) {
    global $db_ip,$db_user,$db_pwd,$dbname,$handle;
    $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
    $handle->set_charset('utf8');
    if(!$handle){
      die('Could not connect: ' . mysql_error());
    }else{
      $brand = trim($brand);
      $brand = $handle->real_escape_string($brand);
      $query_check = "SELECT brand.brand_name FROM brand WHERE brand.brand_name='$brand' LIMIT 1";
      if($result = $handle->query($query_check)) {
        $row = $result->fetch_assoc();
        if($row['brand_name']==$brand) {
          $handle->close();
          return "false";
        }else{
          $handle->close();
          return "true";
        }
      }else {
        $handle->close();
      }
    }

}

//เช็กรุ่นว่า ในยี่ห้อนี้มีหรือยัง รับ ยี่ห้อและtype
function query_check_generation($brand_id,$generation) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $brand = trim($brand);
    $generation = trim($generation);
    $brand = $handle->real_escape_string($brand);
    $generation = $handle->real_escape_string($generation);

    $query_check_brand = "SELECT brand.brand_name,brand.brand_id FROM brand WHERE brand.brand_id='$brand_id' LIMIT 1";
    if($result = $handle->query($query_check_brand)) {
      $row = $result->fetch_assoc();
      $handle->close();

      if($row['brand_id']==$brand_id) { //เช็กว่า มี brand อยู่ไหม
        $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
        $handle->set_charset('utf8');
        if(!$handle){
          die('Could not connect: ' . mysql_error());
        }else{  // ถ้ามี brand ให้มี ควิลี่ gen อีกว่ามี อยู่ใน DB ไหม
          $query_check_b_g = "SELECT generation.brand_id,generation.generation_name
                              FROM generation
                              WHERE generation.brand_id='$brand_id' AND generation.generation_name='$generation'
                              LIMIT 1";
              if($result = $handle->query($query_check_b_g)) {
                  $row = $result->fetch_assoc();
                  if($row['brand_id']==$brand_id and $row['generation_name']==$generation) {
                    $handle->close();
                    return "false";
                  }else {
                    $handle->close();
                    return "true";
                  }
              }
              else {
                $handle->close();
                return "NO query";
              }
        }

      }else {
        // ไม่มี brand
        echo "error";
      }
    }
  }

}

// เช็กว่า type นี้มีหรือยัง
function query_check_type($type) {
    global $db_ip,$db_user,$db_pwd,$dbname,$handle;
    $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
    $handle->set_charset('utf8');
    if(!$handle) {
      die('Could not connect: ' . mysql_error());
 	  }else{
      $type = trim($type);
      $type = $handle->real_escape_string($type);
      $query_check = "SELECT type.type_name FROM type WHERE type.type_name='$type' LIMIT 1 ";
      if($result = $handle->query($query_check)) {
        $row = $result->fetch_assoc();
        if($row['type_name']==$type){
          $handle->close();
          return "false";
        }else {
          $handle->close();
          return "true";
        }
      }else {
        $handle->close();
      }
    }

}
// เช็กว่า ลักษณะ ใน type นี้มีหรือยัง
function query_check_nature($type,$nature) {
  global $db_ip,$db_user,$db_pwd,$dbname;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $type = trim($type);
    $nature = trim($nature);
    $type = $handle->real_escape_string($type);
    $nature = $handle->real_escape_string($nature);
    $query_check_t = "SELECT type.type_id FROM type WHERE type.type_id='$type'";
    if($result = $handle->query($query_check_t)){
      $row = $result->fetch_assoc();
      $handle->close();
      if($row['type_id']==$type) {
        $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
        $handle->set_charset('utf8');
        if(!$handle){
          die('Could not connect: ' . mysql_error());
        }else{
          $query_check_t_n = "SELECT nature.nature_name,nature.type_id
                              FROM nature
                              WHERE nature.nature_name='$nature' and nature.type_id='$type'
                              LIMIT 1";
          if($result = $handle->query($query_check_t_n)){
                $row = $result->fetch_assoc();
                if($row['nature_name']==$nature) {
                  $handle->close();
                  return "false";
                }else{
                  $handle->close();
                  return "true";
                }
          }else {
            $handle->close();
          }
        }

      }else{
        echo "error";
      }
    }
  }
}


 ?>
