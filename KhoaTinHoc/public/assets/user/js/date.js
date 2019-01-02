var dateNow = new Date();var date = document.querySelector('.date');
var year = dateNow.getFullYear();
var month = (dateNow.getMonth() + 1);
month = (month < 10)? '0' + month : month;
var day = dateNow.getDate();
day = (day < 10)? '0' + day : day;
var now = year + '-' + month + '-' + day;
date.value = now;