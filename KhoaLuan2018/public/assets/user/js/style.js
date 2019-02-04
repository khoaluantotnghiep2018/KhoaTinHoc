// Hiển thị đồng hồ load chương trình
function timeclock() {
	var today = new Date();
	var weekday = new Array(7);
	weekday[0] = "Sunday";
	weekday[1] = "Monday";
	weekday[2] = "Tuesday";
	weekday[3] = "Wednesday";
	weekday[4] = "Thursday";
	weekday[5] = "Friday";
	weekday[6] = "Saturday";
	var day = weekday[today.getDay()];
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	nowTime = h + ":" + m + ":" + s;
	if (dd < 10) { dd = '0' + dd } if (mm < 10) { mm = '0' + mm } today = day + ', ' + dd + '/' + mm + '/' + yyyy;

	tmp = '<span>' + today + ' | ' + nowTime + '</span>';

	document.getElementById("clocktop").innerHTML = tmp;

	clocktime = setTimeout("timeclock()", "	", "JavaScript");
	function checkTime(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}
}

const thongbao = document.querySelector('.right-information');
const main = document.querySelector('.main');
var height = thongbao.offsetHeight;

const listA = document.querySelectorAll('.nav > ul > li > a');

var danhmuc = document.querySelector('.danhmuc');
var close = document.querySelector('.close');
var closeForm = document.querySelector('.close-form');
var headerLogin = document.querySelector('.header-login');
var logForm = document.querySelector('.log-form');
var linkRegister = document.querySelector('.link-register');
var linkLogin = document.querySelector('.link-login');
var formDangky = document.querySelector('.form-dangky');
var formDangnhap = document.querySelector('.form-dangnhap');
var nav = document.querySelector('.nav');
var menu = document.querySelector('.bar-menu');
var tagI = document.querySelector('.left-menu .danhmuc i.fas.fa-angle-down');
var tagUl = document.querySelector('.left-menu ul');
var menuSub = document.querySelector('.left-menu__sub');

var tagLi = document.querySelectorAll('.left-menu li');
// console.log(tagLi);
// console.log(danhmuc);

danhmuc.onclick = function()
{
	tagI.classList.toggle('rota');
	tagUl.classList.toggle('block');
}
menu.onclick = function()
{
	nav.classList.add('hien');
}

close.onclick = function()
{
	nav.classList.remove('hien');
}

headerLogin.onclick = function()
{
	logForm.classList.add('displayForm');
}

linkRegister.onclick = function()
{
	formDangnhap.classList.add('displayFormLog');
	formDangky.classList.add('displayFormRe');
	return false;
}


linkLogin.onclick = function()
{
	formDangnhap.classList.remove('displayFormLog');
	formDangky.classList.remove('displayFormRe');
	return false;
}

closeForm.onclick = function()
{
	logForm.classList.remove('displayForm');
}




$(document).ready(function(){
	var width = $(window).width(); 
	$('.left-menu li').click(function(){
		$(this).find('.left-menu__sub').slideToggle();
	});

var vitri = $('.footer').offset();
	$('.contact-title').click(function(){
		$(this).toggleClass('biendoi');
		$('.contact-content').slideToggle();
		$('.contact-title__close').toggleClass('hien');
	});
	$(window).scroll(function(){

		if($(document).scrollTop() > 175)
		{
			$('.nav').addClass('stop');
		}
		else {
			$('.nav').removeClass('stop');
		}

		if($(document).scrollTop() > 100)
		{
			$('.clickTop').css('display','block');
			$('.contact-title').addClass('change');
		}
		else {
			$('.clickTop').css('display','none');
			$('.contact-title').removeClass('change');
		}
	});

	$('.clickTop').click(function(){
		$('body,html').animate({scrollTop:0}); 
	});
	if(window.screen.width < 1000)
	{
		$('.nav .showsubmenu').css('display','block');
		let heightThongbao = thongbao.clientHeight; 
		$('.nav .showsubmenu').click(function(e){
			e.preventDefault();
			($(this).attr('class') === 'fa fa-minus showsubmenu') ? 
			$(this).attr('class','fa fa-plus-square showsubmenu') :
			$(this).attr('class','fa fa-minus showsubmenu');
			$(e.target.parentElement.nextElementSibling).slideToggle();  	
		}); 
	}
	if(window.screen.width <= 650)
	{
		main.style.paddingTop = height + 35 + 'px';
	}
 
});


// Xử lý logout
modalLogout = document.getElementById("logout-form");
function clickLogout() {
	modalLogout.style.display = "block";
}
btnExit = document.getElementsByClassName("closeLogout")[0];
btnExit.onclick = function () {
	modalLogout.style.display = "none";
}  
window.onclick = function(event) {
	if (event.target == modalLogout) {
		modalLogout.style.display = "none";
	}
}
 
