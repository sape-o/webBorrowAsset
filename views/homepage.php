<?php
//ตัว อย่างโค้ด
//https://www.w3schools.com/howto/howto_css_notification_button.asp  แจ้งเตือน
//https://www.w3schools.com/howto/howto_css_rounded_images.asp
//https://www.w3schools.com/howto/howto_js_slideshow.asp
// https://www.w3schools.com/howto/howto_js_toggle_password.asp show password
if($index_check!='nologin') {
  header("HTTP/1.0 404 Not Found");
  echo '
      <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
      <html><head>
      <title>404 Not Found</title>
      </head><body>
      <h1>Not Found</h1>
      <p>The requested URL /b5813872/views/homepage.php was not found on this server.</p>
      <hr>
      <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
      </body></html><!-- Do not try hack this web site-->';
  exit();
}
?>

<!-- login -->
  <div id="login" class="modal">
  <div class="modal-background"></div>

      <div class="container">
        <div class="modal-card animate login">
          <header class="modal-card-head">
            <p class="modal-card-title">ล็อกอิน</p>
            <button onclick="document.getElementById('login').style.display='none'" class="delete" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <form id="from_login" method="post" action="<?php echo $host ?>">
              <label for="username"><b>Username</b></label><br>
              <input id="username_login" class="input is-info"  type="text" placeholder="Enter Username" name="username" required><br><br>
              <label for="password"><b>Password</b></label><br>
              <input id="password_login" class="input is-info"  type="password" placeholder="Enter Password" name="password" required><br>
              <input type="hidden" name="login_hidden" value="login">
              <label id="alert_login_fail" style="color:red"></label>
              <span class="psw"> <a href="#"> Forgot password?</a></span>
            </form>
          </section>
          <footer class="modal-card-foot">
            <button id="submit_login" class="button is-info is-outlined">submit</button>
            <button  class="button is-danger "  type="button"
            onclick="document.getElementById('login').style.display='none'"
                  >Cancel</button>
          </footer>
        </div>
      </div>

  </div>
  <!-- login -->

  <!-- register -->
  <div id="regis" class="modal">
    <div  class="modal-background"></div>
      <div class="container">
        <div class="modal-card animate">
        <header class="modal-card-head">
          <p class="modal-card-title">Register</p>
          <button onclick="document.getElementById('regis').style.display='none'" class="delete" aria-label="close"></button>
        </header>

          <section class="modal-card-body">
            <form id="form_re" method="post" action="<?php echo $host ?>" >
              <div class="tile">
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label ><b>Firstname</b></label>&nbsp;<label id="firstname_jqry" style="color:red;"></label><br>
                    <input id="firstname" class="input is-primary" type="text" placeholder="Enter Firstname" name="firstname" required>
                  </article>
                </div>
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="Lastname"><b>Lastname</b></label>&nbsp;<label id="lasttname_jqry" style="color:red;"></label><br>
                    <input id="lastname" class="input is-primary"  type="text" placeholder="Enter Lastname" name="lastname" required>
                  </article>
                </div>
              </div>

              <div class="tile">
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="age"><b>Age</b></label><br>
                    <div class="select is-fullwidth" value="14">
                      <select name="age">
                      <option value="13" selected="selected">13</option>
                    <?php
                      for($i=14;$i<=120;$i++){
                        echo "<option value=".$i.">".$i."</option>";
                      }
                     ?>
                      </select>
                    </div>
                  </article>
                </div>
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="gender"><b>Gender</b></label><br>
                    <div class="field">
                      <input class="is-checkradio" id="exampleRadioInline1" type="radio" name="gender" value="Mele" checked="checked">
                      <label for="exampleRadioInline1">Mele</label>
                      <input class="is-checkradio" id="exampleRadioInline2" type="radio" name="gender"value="Femele">
                      <label for="exampleRadioInline2">Femele</label>
                    </div>
                  </article>
                </div>
              </div>

              <div class="tile">
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="username"><b>Username</b></label>&nbsp;<label id="username_jqry" style="color:red"></label><br>
                    <div class="field">
                      <p class="control has-icons-left has-icons-right">
                        <input id="username" class="input is-info"  type="text" placeholder="Enter Username" name="username" required>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">

                        </span>

                      </p>
                    </div>
                  </article>
                </div>
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="password"><b>Password</b></label><br>
                    <div class="field">
                      <p class="control has-icons-left">
                        <input class="input is-info"  type="password" placeholder="Enter Password" name="password" required>
                        <span class="icon is-small is-left">
                          <i class="fas fa-lock"></i>
                        </span>

                      </p>
                    </div>
                  </article>
                </div>
              </div>

              <div class="tile">
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="email"><b>E-mail</b></label>&nbsp;<label id="email_jqry" style="color:red"></label><br>
                    <div class="control has-icons-left has-icons-right">
                      <input id="email" class="input is-info"  type="text" placeholder="Enter Email" name="email" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                      <span class="icon is-small is-right">
                      </span>
                    </div>
                  </article>
                </div>
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="tel"><b>Mobile Phone</b></label>&nbsp;<label id="tel_jqry" style="color:red;"></label><br>
                    <div class="control has-icons-left has-icons-right">
                      <input id="tel" class="input is-rounded is-info"  type="text" placeholder="Enter Mobile Phone" name="tel" required>
                      <input type="hidden" name="regis_hidden" value="regis">
                      <span class="icon is-small is-left">
                      <i class="fas fa-mobile-alt"></i>
                      </span>
                      <span class="icon is-small is-right">
                      </span>
                    </div>
                  </article>
                </div>
              </div>

              <div class="tile">
                <div class="tile is-parent">
                  <article class="tile is-child  is-info">
                    <label for="status"><b>อาชีพ</b></label><br>
                    <div class="select is-fullwidth">
                      <select name="status">
                        <option value="" selected="selected" hidden>เลือกอาชีพ</option>
                        <option value="student">นักศึกษา</option>
                        <option value="teacher">อาจารย์</option>
                        <option value="other">อื่นๆ</option>
                      </select>
                    </div>
                  </article>
                </div>
              </div>
            </form>
          </section>
          <footer class="modal-card-foot">
            <button id="resis_submit" class="button is-info is-outlined" type="submit" >Register</button>
            <button  class="button is-danger" type="button" onclick="document.getElementById('regis').style.display='none'"
                  class="cancelbtn">Cancel</button>

          </footer>
        </div>
      </div>

  </div>
  <!-- register -->


  <!-- nav bar-->
  <!-- https://bulma.io/documentation/components/navbar/ -->
    <nav class="navbar is-primary" role="navigation" aria-label="main navigation" style="position: sticky;top:0;left:0;rigth:0;width: 100%; z-index: 2;">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo $host?>">
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
          <a class="navbar-item ">
            Home
          </a>

          <a class="navbar-item">
            Documentation
          </a>

          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              More
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item">
                About
              </a>
              <a class="navbar-item">
                Jobs
              </a>
              <a class="navbar-item">
                Contact
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item" href="<?php echo $host."developer.php"?>">
                นักพัฒนา
              </a>
            </div>
          </div>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-dark" onclick="document.getElementById('regis').style.display='block'">
                <strong>Sign up</strong>
              </a>
              <a class="button is-link" onclick="document.getElementById('login').style.display='block'">
                <strong>Log in</strong>
              </a>
            </div>
          </div>
        </div>
      </div>
  </nav>
  <!-- //nav bar-->
  <!-- <br><br><br><br><br><br><br><br><br><br> -->


<div class='carousel carousel-animated carousel-animate-fade' data-autoplay="true" style="display: block;z-index: 1;">
  <div class='carousel-container' style="max-width: 100%;max-height: 510px; object-fit: cover;">
    <div class='carousel-item has-background is-active'>
      <img class="is-background" src="https://wikiki.github.io/images/merry-christmas.jpg" alt="" />
      <div class="title">Merry Christmas</div>
    </div>
    <div class='carousel-item has-background'>
      <img class="is-background" src="https://wikiki.github.io/images/singer.jpg" alt=""/>
      <div class="title">Original Gift: Offer a song with <a href="https://lasongbox.com" target="_blank">La Song Box</a></div>
    </div>
    <div class='carousel-item has-background'>
      <img class="is-background" src="https://wikiki.github.io/images/sushi.jpg" alt=""/>
      <div class="title">Sushi time</div>
    </div>
    <div class='carousel-item has-background'>
      <img class="is-background" src="https://wikiki.github.io/images/life.jpg" alt=""/>
      <div class="title">Life</div>
    </div>
  </div>
  <div class="carousel-navigation is-overlay">
    <div class="carousel-nav-left">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div class="carousel-nav-right">
      <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>
</div>

<div class="working">
  <progress class="progress is-primary" value="90" max="100">15%</progress>
  <p>
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci cumque, ipsum ducimus vitae ab illo facilis magni? Inventore, deleniti optio natus earum perferendis exercitationem, odit veniam labore quae consequuntur nam!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam quae ad repellat quasi officia ducimus mollitia beatae cupiditate fugiat ea quia, maxime rem porro! Cumque, soluta non? Architecto, minima!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam quae ad repellat quasi officia ducimus mollitia beatae cupiditate fugiat ea quia, maxime rem porro! Cumque, soluta non? Architecto, minima!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam quae ad repellat quasi officia ducimus mollitia beatae cupiditate fugiat ea quia, maxime rem porro! Cumque, soluta non? Architecto, minima!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam quae ad repellat quasi officia ducimus mollitia beatae cupiditate fugiat ea quia, maxime rem porro! Cumque, soluta non? Architecto, minima!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam quae ad repellat quasi officia ducimus mollitia beatae cupiditate fugiat ea quia, maxime rem porro! Cumque, soluta non? Architecto, minima!
  </p>
</div>









<footer class="footer" style="bottom: 0;left: 0;right: 0;width: 100%;padding: 1.5rem;background: #D3D3D3;position: sticky;">
  <div class="content has-text-centered">
    <p>
      <strong>&copy; Copyright 2019</strong> The source code is licensed
      <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
      is licensed.
    </p>
  </div>
</footer>
