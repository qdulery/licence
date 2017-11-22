$(document).ready(function init(){
	$('li a.over-video').mouseenter(function(){
		$('img', this).hide();
		$(this).addClass("affiche");
		$(this).next().animate({ "left": "+=400px" }, "slow" );
    });
    $('li a.over-video').mouseleave(function(){
		$('img', this).show();
		$(this).removeClass("affiche");
		$(this).next().animate({ "left": "-=400px" }, "slow" );
    });
});

  