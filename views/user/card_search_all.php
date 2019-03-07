<?php
  if($index_check!='user_type2') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/user/card_search_all.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }


?>
<script>
var datacheck;
var datacheck2;

getData();
setInterval(getData,1000);

function getData() {
   var xhttp;
   xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       datacheck = this.responseText;
       if(datacheck != datacheck2){
         createTable(this.responseText);
         datacheck2 = datacheck;
       }

     }
   };
   xhttp.open("GET", "controllers/user/api/get_asset.php?q=query", true);
   xhttp.send();
}

function createTable(data1) {
  //alert(data1);
  var data=JSON.parse(data1);
   var eTable='\
   <table boder=1 class="table is-striped">\
      <thead>\
        <tr>\
          <th>ที่</th>\
          <th>รหัสครุภัณฑ์</th>\
          <th>ชนิด</th>\
          <th>ลักษณะ</th>\
          <th>ยี่ห้อ</th>\
          <th>รุ่น</th>\
          <th>s/n</th>\
          <th>สถานะ</th>\
          <th></th>\
        </tr>\
      </thead>\
      <tbody>';


  for(var i in data) {

      eTable+= '<tr>';
      eTable+= '<td>'+(i+1)+'</td>';
      eTable+= '<td>'+data[i].serial+'</td>';
      eTable+= '<td>'+data[i].type_name+'</td>';
      eTable+= '<td>'+data[i].nature_name+'</td>';
      eTable+= '<td>'+data[i].brand_name+'</td>';
      eTable+= '<td>'+data[i].generation_name+'</td>';
      eTable+= '<td>'+data[i].sn+'</td>';

      if(data[i].status=="ใช้งานไม่ได้"){
        eTable+= '<td style="color:red;">'+data[i].status+'</td>';
      }else{
        eTable+= '<td style="color:blue;">'+data[i].status+'</td>';
      }


        if(data[i].transection_id==1){
          eTable+= '<td><button class="button is-danger" style="width:80%;" disabled>ถูกยืมแล้ว</button></td>';
        }else{
          eTable+= '<td><button class="button is-info" style="width:80%" onclick="book_temp('+data[i].asset_id+')" id="change">จอง</button></td>';
        }



      eTable+='</tr>';

  }

  eTable += '<tr></tr>';
  eTable += '</tbody>';
  eTable +=  '</table>';
  $('#forTable').html(eTable);
}

</script>
<!-- cardloop ค้นหาทั้งหมด-->

<div class="box" style="margin:20px;">
  <div class="card-content">
    <div class="content">
      <div id="forTable"></div>
    </div>
  </div>
</div>

<!-- //card loop ค้นหาทั้งหมด-->
