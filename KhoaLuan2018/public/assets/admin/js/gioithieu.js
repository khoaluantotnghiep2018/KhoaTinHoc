$(document).ready(function () {
    if (tinymce.editors.length > 0) {
        for (i = 0; i < tinymce.editors.length; i++) {
            tinymce.editors[i].remove();
        }
    }
    tinymce.init({
        selector: "#textGioiThieu",
        theme: "modern",
        paste_data_images: true,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        file_picker_callback: function (callback, value, meta) {
            if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        callback(e.target.result, {
                            alt: ''
                        });
                    };
                    reader.readAsDataURL(file);
                });
            }
        },
        templates: [{
            title: 'Test template 1',
            content: 'Test 1'
        }, {
            title: 'Test template 2',
            content: 'Test 2'
        }]
    });
 
});

$(document).ready(function() {
    $('#suagioithieu').click(function () { 
        // alert(tinyMCE.activeEditor.getContent());  
        // alert(tinyMCE.activeEditor.getContent({format : 'raw'}));
        var textgioithieu = tinyMCE.get('textGioiThieu').getContent(); 
        if(textgioithieu != ""){
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url:'quantri/gioithieu/sua',
                method:'post',
                data: {textgioithieu: textgioithieu},
                success:function(response){  
                    if(response == 1){
                        $('#suagioithieu').val = response;
                        // Hiển thị thông báo thành công
                        $.notify({
                            title: "Thành công : ",
                            message: "Nội dung đã được cập nhật!",
                            icon: 'fa fa-check' 
                        },{
                            type: "success"
                        });     
                    }
                    else{
                        swal({
                            title: "Lỗi dữ liệu, cập nhật thất bại!",
                        });
                    } 
                }
            })
        }
        else{
            swal({
                title: "Bạn cần nhập nội dung!",
            });
        }

    });
});

