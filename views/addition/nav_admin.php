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
    <p>The requested URL /b5813872/views/addition/nav_admin.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
<!-- nav bar-->
<!-- https://bulma.io/documentation/components/navbar/ -->
  <nav class="navbar is-primary" role="navigation" aria-label="main navigation" style="position: sticky;z-index: 9999;top:0;left:0;rigth:0;">
    <div class="navbar-brand">
      <a class="navbar-item" href="<?php $host ?>" >
        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarToggle">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarToggle" class="navbar-menu">
      <div class="navbar-start">
          <a class="navbar-item<?php if($_SESSION['state_nav']=='add') echo ' is-active';?>" href="<?php echo '?add='.$_SESSION['username'] ?>">
            เพิ่มครุภัณฑ์
          </a>
          <a class="navbar-item<?php if($_SESSION['state_nav']=='asset') echo ' is-active';?>" href="<?php echo '?asset='.$_SESSION['username'] ?>">
            รายการครุภัณฑ์
          </a>
          <a class="navbar-item<?php if($_SESSION['state_nav']=='booking') echo ' is-active';?>" href="<?php echo '?booking='.$_SESSION['username'] ?>">
            กำลังจอง
          </a>
          <a class="navbar-item<?php if($_SESSION['state_nav']=='borrowing') echo ' is-active';?>" href="<?php echo '?borrowing='.$_SESSION['username'] ?>">
            กำลังยืม
          </a>
          <a class="navbar-item<?php if($_SESSION['state_nav']=='history') echo ' is-active';?>" href="<?php echo '?history='.$_SESSION['username'] ?>">
            ประวัติทั้งหมด
          </a>
          <a class="navbar-item<?php if($_SESSION['state_nav']=='user') echo ' is-active';?>" href="<?php echo '?user='.$_SESSION['username'] ?>">
            user
          </a>

          <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                แก้ไข
              </a>
              <div class="navbar-dropdown">
                  <a class="navbar-item">
                    homepage
                  </a>
                  <a class="navbar-item">
                    document
                  </a>
                  <a class="navbar-item">
                    About
                  </a>
                  <a class="navbar-item">
                    Contact
                  </a>
                  <a class="navbar-item">
                    Report an issue
                  </a>
              </div>
          </div>
      </div>
      <div class="navbar-end">
          <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                <i class="far fa-user"></i>
                <?php echo"&nbsp;&nbsp;คุณ&nbsp;".$_SESSION['firstname']." ".$_SESSION['lastname']; ?>
              </a>
              <div class="navbar-dropdown is-right">
                <a class="navbar-item" href="<?php echo '?log='.$_SESSION['username'] ?>">
                  Log login
                </a>
                <a class="navbar-item">
                  IP : <?php echo $_SERVER["REMOTE_ADDR"];  ?>
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                   <a class="button is-danger is-outlined" style="width:100%;" href="logout.php">Log out</a>
                </a>


                </a>
              </div>
            </div>
        </div>
    </div>
</nav>
