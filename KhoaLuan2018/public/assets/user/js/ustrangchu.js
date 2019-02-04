$(document).ready(function() { 
	 var ngayhienthi = moment($('#ngaybatdauthongbao').val()).format("DD-MM-YYYY");
     var homnay = moment().format('DD-MM-YYYY');
     var ngayhethan = moment($('#ngayhethanthongbao').val()).format("DD-MM-YYYY");  
     if((homnay <= ngayhethan ) && (homnay >= ngayhienthi)){
     	$(".right-information").css("display","block"); 
     }
     else{
     	$(".right-information").css("display","none");  
     }
});