$(document).ready(init());

function init(){
	alert($('html').html());
	//$('html').html('Bonjour');
	$("ul li ul").hide();

	$("li").mouseenter(function(){
		$("ul", this).slideDown();
	});
	$("li").mouseleave(function(){
		$("ul", this).slideUp();
	});
}

  