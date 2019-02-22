function send(id){
    $.ajax({
        data: 'asset_id=' + id,
        url: 'controllers/admin/api/insert_status.php',
        method: 'POST', // or GET
        success: function(msg) {
            if(msg == 'finish'){
                //alert("เปลี่ยนสถานะสำเร็จ");
                location.reload();
            }else{
                alert("Error!!!");
            }

        }
    });
}
