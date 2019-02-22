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
    <p>The requested URL /b5813872/views/addition/head_admin.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
 <html style="background: #F3F2F2;">
   <head>
     <title> <?php echo "Admin: ".$_SESSION['firstname']  ?> </title>
      <meta charset="UTF-8">
      <meta name="keywords" content="ศูนย์เครื่องมือ,f11,sut,SUT,มทส,มหาวิทยาลัยเทคโนโลยีสุรนารี">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="public/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="public/jq/jquery-1.10.2.js"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
     <link rel="stylesheet" href="public/css/card_asset_all.css">
     <link rel="stylesheet" href="public/css/login.css">
     <link rel="stylesheet" href="public/css/bulma/css/bulma.css">
     <link rel="stylesheet" href="public/css/bulma/css/bulma.min.css">
     <link rel="stylesheet" href="public/css/bulma/css/bulma.css.map">
     <link rel="stylesheet" href="public/css/bulma/css/bulma-checkradio.min.css">

     <script src="public/javascript/check_add_asset.js"></script>
     <script src="public/javascript/change_asset_status.js"></script>
     <script src="public/javascript/change_transection.js"></script>




     <!--  Bulma CSS

     https://bulma.io/documentation/components/navbar/
     https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_login_form_modal

     -->
     <script>
       // Get the modal
       var modal = document.getElementById('login');
       var modal2 = document.getElementById('regis');
       // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
        if (event.target == modal2) {
          modal2.style.display = "none";
        }
      }



      document.addEventListener('DOMContentLoaded', () => {

      // Get all "navbar-burger" elements
      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

          // Add a click event on each of them
          $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {

              // Get the target from the "data-target" attribute
              const target = el.dataset.target;
              const $target = document.getElementById(target);

              // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
              el.classList.toggle('is-active');
              $target.classList.toggle('is-active');

            });
          });
        }
      });

     </script>
   </head>
 <body>
