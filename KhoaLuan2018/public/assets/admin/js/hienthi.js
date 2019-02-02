$("#optionsRadios1").click(function(){  
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:'quantri/hienthi/suahienthirss',
        method:'post',
        data: {trangthai: 1},
        success:function(response){  
            if(response == 1){ 
                // Hiển thị thông báo thành công
                $.notify({
                    title: "Thành công : ",
                    message: "Trạng thái đã cập nhật!",
                    icon: 'fa fa-check' 
                },{
                    type: "success"
                });   
            } 

        }
    }) 
});

$("#optionsRadios2").click(function(){  
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:'quantri/hienthi/suahienthirss',
        method:'post',
        data: {trangthai: 0},
        success:function(response){  
            if(response == 1){ 
                // Hiển thị thông báo thành công
                $.notify({
                    title: "Thành công : ",
                    message: "Trạng thái đã cập nhật!",
                    icon: 'fa fa-check' 
                },{
                    type: "success"
                });   
            } 

        }
    }) 
});