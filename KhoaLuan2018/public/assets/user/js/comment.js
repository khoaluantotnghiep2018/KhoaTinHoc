var btnRep = document.querySelectorAll('.btn-rep');

btnRep.forEach(function(btn){
	btn.addEventListener('click',function(e){
		e.target.parentElement.parentElement.parentElement.nextElementSibling.classList.toggle('hienthi');
		return false;
	});	
});
