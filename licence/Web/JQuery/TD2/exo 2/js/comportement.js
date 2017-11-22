$(document).ready(function(){
	$('nav ul li a').click(function(e){
    	$('article').hide();
    	let art=$(this).attr('href');
    	$(art).fadeIn(1000);
    });
});

  