$(document).ready(function() { 
	 var ngayhienthi = moment($('#ngaybatdauthongbao').val()).format("DD-MM-YYYY");
     var homnay = moment().format('DD-MM-YYYY');
     var ngayhethan = moment($('#ngayhethanthongbao').val()).format("DD-MM-YYYY");  
     if((ngayhethan <= homnay) && (homnay >= ngayhienthi)){
     	// console.log("ok");
     }
});