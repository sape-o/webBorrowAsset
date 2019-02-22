<?php
// core_de_query_all_table_admin.php
/* เป็น API query Table ใน DB ทั้งหมด โดย select มาทั้งหมด
 *
 */

 if(!file_exists("../../database/core_db_pass.php") ){
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/controllers/database/admin/core/query/query_all_table.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

include("../../database/core_db_pass.php");

// function select, return json ( brand_id ,brand_name)
function query_brand_all_admin() {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $query_brand = "SELECT brand.brand_id,brand.brand_name FROM brand";
    if($result = $handle->query($query_brand)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $brand[] = $row;
      }
      $handle->close();
      return json_encode($brand);
    }else{
      $handle->close();
      return "NO";
    }

  }
}
// function select, return json (generation_id,generation_name)
function query_generation_all_admin($brand_id) {// ไม่ได้ใช้ ทำเผื่อเฉยๆ
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    //$brand_id = trim($brand_id);
    $query_generation = "SELECT generation.generation_id,generation.generation_name FROM generation WHERE generation.brand_id='$brand_id'; ";
    if($result = $handle->query($query_generation)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $generation[] = $row;
      }
      $handle->close();
      return json_encode($generation);
    }else{
      $handle->close();
      return "NO";
    }
  }
}
// function select, return json (type_id,type_name)
function query_type_all_admin() {// ไม่ได้ใช้ ทำเผื่อเฉยๆ
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $query_type = "SELECT type.type_id,type.type_name FROM type";

    if($result = $handle->query($query_type)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $type[] = $row;
      }
      $handle->close();
      return json_encode($type);
    }else{
      $handle->close();
      return "NO";
    }
  }
}
// function select, return json (nature_id,nature_name)
function query_nature_all_admin($type_id) {// ไม่ได้ใช้ ทำเผื่อเฉยๆ
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $query_nature = "SELECT nature.nature_id,nature.nature_name FROM nature WHERE nature.type_id='$type_id' ";

    if($result = $handle->query($query_nature)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $nature[] = $row;
      }
      $handle->close();
      return json_encode($nature);
    }else{
      $handle->close();
      return "NO";
    }
  }
}
// function select, return json
function query_generation_JOIN_brand_admin() {// ไม่ได้ใช้ ทำเผื่อเฉยๆ
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{

    $query_gen_brand = "SELECT brand.brand_id,brand.brand_name,generation.generation_id,generation.generation_name
                        FROM brand
                        JOIN generation
                        ON brand.brand_id=generation.brand_id";

                      $test=  "SELECT JSON_OBJECT(
                    'brand_id', brand.brand_id,
                    'brand_name', brand.brand_name,

                  )
                  FROM brand";
    if($result = $handle->query($query_gen_brand)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $generation[] = $row;
      }
      $handle->close();
      echo json_encode($generation);
    }else {
      $handle->close();
      echo "No data query";
    }

    return "NO";
  }
}

 ?>
