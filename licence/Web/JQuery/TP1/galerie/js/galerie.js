$(document).ready(function(){
	$('div#galerie ul#galerie_mini li a').mouseenter(function init(){
		var href=$(this).attr('href');
		var title=$(this).attr('title');

		$('div#galerie div#photo img').attr('src', href);
		$('div#galerie div#photo h2').html(title);
    });
});

  