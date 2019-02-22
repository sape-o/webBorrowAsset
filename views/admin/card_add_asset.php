<?php
  if($index_check!='user_type1') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/admin/card_add_asset.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }
include("controllers/database/admin/core/query/query_all_table.php");
?>


 <!-- card เพิ่ม-->
<div style="margin:20px;">
   <div class="tile is-ancestor">
     <div class="tile is-vertical">
       <div class="tile">
         <div class="tile is-parent is-vertical">

          <!-- Done -->
           <article class="tile is-child box">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">รหัสครุภัณฑ์</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="text" placeholder="Asset ID">
                  </p>
                </div>
              </div>
            </div>
          <!-- // -->

          <!-- Keeper -->
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">ผู้ดูแลครุภัณฑ์</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="text" placeholder="Keeper Name">
                  </p>
                </div>
              </div>
            </div>

            <!-- Brancd and Gen -->
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">ยี่ห้อ</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select>
                        <option value="Select Nature" selected="selected" hidden>เลือกยี่ห้อ</option>
                        <option>Business development</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select>
                        <option value="Select Nature" selected="selected" hidden>เลือกรุ่น</option>
                        <option>Business development</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Type and Nature -->
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Type</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select>
                        <option value="Select Nature" selected="selected" hidden>Type</option>
                        <option>Business development</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select>
                        <option value="Select Nature" selected="selected" hidden>Nature</option>
                        <option>Business development</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- S/N -->
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">S / N</label>
              </div>
              <div class="field-body">
                <div class="field is-half">
                  <p class="control">
                    <input class="input" type="text" placeholder="S/N">
                  </p>
                </div>
              </div>
            </div>
            <!-- Stock -->
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Stock</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <p class="control">
                    <input class="input" type="text" placeholder="e.g. F11325">
                  </p>
                </div>
              </div>
            </div>

            <!-- Stock -->
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">วันที่รับของ</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <p class="control">
                    <input class="input" type="date">
                  </p>
                </div>
              </div>
            </div>

            <!-- สภาพการใช้งาน -->
            <div class="field is-horizontal">
              <div class="field-label">
                <label class="label">สภาพ</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <input class="is-checkradio" id="use" type="radio" name="state" checked="checked">
                  <label for="use">ใช้งานได้</label>
                  <input class="is-checkradio" id="not" type="radio" name="state">
                  <label for="not">ใช้งานไม่ได้</label>
                </div>
              </div>
            </div>

            <!-- Button for Submit -->
            <div class="field is-horizontal">
              <div class="field-label">
                <!-- Left empty for spacing -->
              </div>
              <div class="field-body">
                <div class="field is-narrow is-middle">
                  <div class="control">
                      <a class="button is-success is-medium">
                        <span class="icon is-small">
                          <i class="fas fa-plus-circle"></i>
                        </span>
                        <span>เพิ่ม</span>
                      </a>
                  </div>
                </div>
              </div>
            </div>
           </article>
         </div>
       </div>
     </div>
   </div>
</div>



<!-- <section class="section" style="background: #F3F2F2;">
  <div class="container">
    <div class="field is-fullwidth">
      <label class="label">รหัสครุภัณฑ์</label>
      <div class="control">
        <input class="input" type="text" placeholder="Asset ID.">
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="Info input">
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="Success input">
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="Warning input">
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="Danger input">
      </div>
    </div>
  </div>
</section>



 -->







       <?php

       ?>
 <!-- //card  เพิ่ม-->
