<?php

/* เอาไว้ดัก ถ้าเกิดว่า มีคนเข้าผ่านลิ้งนี้โดยตรงเช่น  server.com/addition/head_admin.php มันจะแสดงว่าไม่มีไฟลนี้ (ทั้งๆที่มี)
 * จะสามารถ รันไฟล นี้ได้ก็ต่อเมื่อ เข้าผ่าน index.php และ และ index.php เรียกใช้ไฟล นี้เท่านั้น
 */
if($index_check!='user_type1') {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/admin/core_api/insert.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}

include("controllers/database/admin/core/insert/addasset.php");

if(isset($_POST['serial'])        AND trim($_POST['serial'])!='' AND
  isset($_POST['keeper'])         AND trim($_POST['keeper'])!='' AND
  isset($_POST['status'])         AND trim($_POST['status'])!='' AND
  isset($_POST['sn'])             AND trim($_POST['sn'])!='' AND
  isset($_POST['location'])       AND trim($_POST['location'])!='' AND
  isset($_POST['comment'])        AND trim($_POST['comment'])!='' AND
  isset($_POST['acquired_date'])  AND trim($_POST['acquired_date'])!='' AND
  isset($_POST['purchase_price']) AND trim($_POST['purchase_price'])!='' AND
  isset($_POST['generation_id'])  AND trim($_POST['generation_id'])!='' AND
  isset($_POST['nature_id'])      AND trim($_POST['nature_id'])!=''
  ) {
    $status = insert_asset_admin($_POST['serial'],
                                $_POST['keeper'],
                                $_POST['status'],
                                $_POST['sn'],
                                $_POST['location'],
                                $_POST['comment'],
                                $_POST['acquired_date'],
                                $_POST['purchase_price'],
                                $_POST['generation_id'],
                                $_POST['nature_id']
                            );
    if($status!="finish") {
          include("views/error/error_in.php");
          exit();
    }
}else if(isset($_POST['brand_id']) and trim($_POST['brand_id'])!='' AND
         isset($_POST['add_gen']) and trim($_POST['add_gen'])!='') {
  // insert generation  by use brand_id and generation_name
  $status = insert_generation_asset_admin($_POST['brand_id'],$_POST['add_gen']);
  if($status!="finish") {
    include("views/error/error_in.php");
  }
}else if(isset($_POST['brand']) and trim($_POST['brand'])!='') {
  // insert brand
  $status = insert_brand_asset_admin($_POST['brand']);
  if($status!="finish") {
    include("views/error/error_in.php");
    exit();
  }
}else if(isset($_POST['type_id']) and trim($_POST['type_id'])!='' AND
         isset($_POST['add_nature']) and trim($_POST['add_nature'])!='') {
  // insert nature by user type_id and nature_name
  $status = insert_nature_admin($_POST['type_id'],$_POST['add_nature']);
  if($status!="finish") {
    include("views/error/error_in.php");
    exit();
  }
}else if(isset($_POST['add_type']) and trim($_POST['add_type'])!='') {
  // insert type
  $status = insert_type_admin($_POST['add_type']);
  if($status!="finish") {
    include("views/error/error_in.php");
    exit();
  }
}

 ?>
