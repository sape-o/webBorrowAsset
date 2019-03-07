<?php


if(!file_exists("../../database/config/core_db_pass.php") ) {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/user/api/insert/get_asset.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/config/core_db_pass.php");

function query_asset_all_user() {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{

    $query_asset = "SELECT asset.asset_id,asset.serial,asset.keeper,asset.status,asset.sn,asset.location,
                           asset.comment,asset.acquired_date,asset.purchase_price,brand.brand_name,
                           generation.generation_name,type.type_name,nature.nature_name
                           FROM asset
                           INNER JOIN generation ON asset.generation_id=generation.generation_id
                           INNER JOIN brand ON generation.brand_id=brand.brand_id
                           INNER JOIN nature ON asset.nature_id=nature.nature_id
                           INNER JOIN type ON nature.type_id=type.type_id
                           WHERE asset.status='ใช้งานได้' ";

    if($result = $handle->query($query_asset)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {

        $asset_id = $row['asset_id'];
        $query_asset = "SELECT transections.transection_id
                        FROM transections
                        WHERE transections.asset_id='$asset_id'
                        AND (transections.transection_status='จอง'
                        OR transections.transection_status='ยืม') ";
        if($result2 = $handle->query($query_asset)) {
          $row2 = $result2->fetch_assoc();
          if($row2['transection_id']>0) {
              $row2['transection_id']=1;
              $json[] = $row+$row2;
          }else {
            $row2['transection_id']=0;
            $json[] = $row+$row2;
          }
        }


      }
      $handle->close();
      $json_asset = json_encode($json);
      return $json_asset;
    }else {
      $handle->close();
      return "NO";
    }
  }

}



 ?>
