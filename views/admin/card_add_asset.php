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
<script >
$(document).ready(function() {
  $("#add_assets").hide();
  $("#add_bgtn").hide();
  var sessionValue = '<?php echo $_SESSION['state_asset_tab']?>';

  if(sessionValue=="0") {
    $("#add_assets").hide();
    $('#clickShow_add_bgtn').addClass('is-active');
    $("#add_bgtn").show();
  }else if(sessionValue=="1") {
    $("#add_bgtn").hide();
    $('#clickShow_add_asset').addClass('is-active');
    $("#add_assets").show();

  }
  $('#clickShow_add_bgtn').click(function() {
    $('#clickShow_add_bgtn').addClass('is-active');
      $("#add_bgtn").show();
      $("#add_assets").hide();
      $('#clickShow_add_asset').removeClass('is-active');
      $.post("<?php echo $host;?>",{sessionTab:'0'});
  });
  $('#clickShow_add_asset').click(function() {
    $('#clickShow_add_asset').addClass('is-active');
    $("#add_assets").show();
    $("#add_bgtn").hide();
    $('#clickShow_add_bgtn').removeClass('is-active');
    $.post("<?php echo $host;?>",{sessionTab:'1'});

  });
});
</script>
<div class="tabs">
  <ul>
    <li id="clickShow_add_bgtn" class=""><a>เพิ่ม ยี่ห้อ,รุ่น,ลักษณะ,ชนิด</a></li>
    <li id="clickShow_add_asset"class=""><a>เพิ่ม คุรภัณฑ์</a></li>
  </ul>
</div>
<div style="margin:20px;" id="add_bgtn">
   <div class="tile is-ancestor">
     <div class="tile is-vertical">
       <div class="tile">
         <div class="tile is-parent is-vertical">
           <article class="tile is-child notification" style="background-color:#e6e6e6">
            <div class="tile is-ancestor">
              <div class="tile">
                <div class="tile is-parent">
                  <div class="tile is-child">
                    <label><strong>เพิ่มยี่ห้อ</strong></label>&nbsp;<label id="add_brand_alert" style="color:red;"></label>
                    <div class="tile" >
                      <form id="brand_a_ass" method="post" action="<?php echo $host;?>">
                        <input id="add_brand" class="input is-info" name="brand" style="width:270px;" placeholder="กรอกยี่ห้อ">
                      </form>
                    </div>
                    <div class="tile">
                      <a id="submit_add_brand" class="button is-info" style="width:270px;">
                        <span class="icon is-small">
                          <i class="fas fa-save"></i>
                        </span>
                        <span>บันทึก</span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="tile is-parent">
                  <form id="generation_a_ass" method="post" action="<?php echo $host;?>">
                    <div class="tile is-child">
                      <label><strong>เพิ่มรุ่น</strong></label>&nbsp;<label id="add_gen_alert" style="color:red;"></label>
                      <div class="tile">
                        <div class="field">
                           <div class="control">
                             <div class="select is-info" style="width:270px;">
                               <select id="brand_select_for_gen" name="brand_id" style="width:270px;">
                                 <option value="NO">เลือกยี่ห้อ</option>
                                 <?php
                                   $data = query_brand_all_admin();// call function
                                   $data = json_decode($data);
                                   foreach($data as $key=>$data){
                                     echo "<option value=".$data->brand_id.">".$data->brand_name."</option>";
                                   }
                                 ?>
                               </select>
                             </div>
                           </div>
                         </div>
                       </div>
                      <div class="tile">
                        <input id="add_gen" name="add_gen" class="input is-info" style="width:270px;" placeholder="กรอกรุ่น">
                      </div>
                      <div class="tile">
                        <a id="submit_add_gen" class=" button is-info" style="width:270px;" >
                          <span class="icon is-small">
                            <i class="fas fa-save"></i>
                          </span>
                          <span>บันทึก</span>
                        </a>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tile is-parent">
                  <div class="tile is-child">
                    <label><strong>เพิ่มชนิด</strong></label>&nbsp;<label id="add_type_alert" style="color:red;"></label>
                    <div class="tile is-child">
                      <div class="tile">
                        <form id="type_a_ass" method="post" href="<?php echo $host;?>">
                          <input id="add_type" name="add_type" class="input is-info"  style="width:270px;" placeholder="กรอกชนิด">
                        </form>
                      </div>
                      <div class="tile">
                        <button id="submit_add_type" class="button is-info" style="width:270px;">
                          <span class="icon is-small">
                            <i class="fas fa-save"></i>
                          </span>
                          <span>บันทึก</span>
                        </button>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="tile is-parent">
                  <div class="tile is-child is-info">
                    <label><strong>เพิ่มลักษณะ</strong></label>&nbsp;<label id="add_nature_alert" style="color:red;"></label>
                      <form id="nature_a_ass" method="post" action="<?php echo $host;?>">
                        <div class="tile">
                          <div class="field">
                             <div class="control">
                               <div class="select is-info" style="width:270px;">
                                 <select id="type_select_for_nature" name="type_id" style="width:270px;">
                                   <option value="NO">เลือกชนิด</option>
                                 <?php
                                   $data = query_type_all_admin();// call function
                                   $data = json_decode($data);
                                   foreach($data as $key=>$data){
                                     echo "<option value=".$data->type_id.">".$data->type_name."</option>";
                                   }
                                 ?>
                                 </select>
                               </div>
                             </div>
                           </div>
                        </div>
                        <div class="tile">
                          <input id="add_nature" name="add_nature" class="input is-info" style="width:270px;" placeholder="กรอกลักษณะ">
                        </div>
                       </form>
                      <div class="tile">
                        <button class="button is-info" id="submit_add_nature" style="width:270px;">
                          <span class="icon is-small">
                            <i class="fas fa-save"></i>
                          </span>
                          <span>บันทึก</span>
                        </button>
                      </div>
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
 <!-- card เพิ่ม-->
<div id="add_assets" style="margin:20px;">
   <div class="tile is-ancestor">
     <div class="tile is-vertical">
       <div class="tile">
         <div class="tile is-parent is-vertical">

          <!-- Done -->
          <form method="post" action="<?php echo $host;?>">
             <article class="tile is-child box">
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">รหัสครุภัณฑ์</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control">
                      <input class="input" type="text" name="serial" placeholder="Asset ID">
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
                      <input class="input" type="text" name="keeper" placeholder="Keeper Name">
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
                        <select id="brand_select" onchange="brand_se(this.value)">
                          <option value="NO" selected="selected" hidden>เลือกยี่ห้อ</option>
                          <?php
                            $data = query_brand_all_admin();
                            $data = json_decode($data);
                            foreach ($data as $key => $data) {
                              echo'<option value='.$data->brand_id.' >'.$data->brand_name.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <div class="control">
                      <div class="select is-fullwidth">
                        <select name="generation" id="generation_select">
                          <option value="NO" selected="selected" hidden>เลือกรุ่น</option>

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
                        <select id="type_select" onchange="type_se(this.value)">
                          <option value="NO" selected="selected" hidden>เลือกชนิด</option>
                          <?php
                            $data = query_type_all_admin();
                            $data = json_decode($data);
                            foreach ($data as $key => $data) {
                              echo'<option value='.$data->type_id.' >'.$data->type_name.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <div class="control">
                      <div class="select is-fullwidth">
                        <select name="nature" id="nature_select">
                          <option value="NO" selected="selected" hidden>เลือกลักษณะ</option>

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
                      <input class="input" type="text" name="sn" placeholder="S/N">
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
                      <input class="input" type="text" name="location" placeholder="e.g. F11325">
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
                      <input class="input" name="date" type="date">
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
                    <input class="is-checkradio" id="use" type="radio" value="ใช้งานได้" name="status" checked="checked">
                    <label for="use">ใช้งานได้</label>
                    <input class="is-checkradio" id="not" type="radio" value="ใช้งานไม่ได้" name="status">
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
                        <button class="button is-success is-medium">
                          <span class="icon is-small">
                            <i class="fas fa-plus-circle"></i>
                          </span>
                          <span>เพิ่ม</span>
                        </button>
                    </div>
                  </div>
                </div>
              </div>
             </article>
          </form>
         </div>
       </div>
     </div>
   </div>
</div>





 <!-- //card  เพิ่ม-->
