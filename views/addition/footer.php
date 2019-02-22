<?php
  /* เอาไว้ดัก ถ้าเกิดว่า มีคนเข้าผ่านลิ้งนี้โดยตรงเช่น  server.com/addition/head_admin.php มันจะแสดงว่าไม่มีไฟลนี้ (ทั้งๆที่มี)
   * จะสามารถ รันไฟล นี้ได้ก็ต่อเมื่อ เข้าผ่าน index.php และ และ index.php เรียกใช้ไฟล นี้เท่านั้น
   */
  if(!isset($index_check)) {
    //echo $index_check;
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/addition/footer.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
 </body>
</html>
