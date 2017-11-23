$(document).ready(init);

function init() {
    $.fatNav();
    $("#gallery").unitegallery();

    $('#fullpage').fullpage({
		scrollingSpeed: 1000,
		sectionsColor: ["blue", "red", "yellow", "white", "purple"],
		navigation: true,
		navigationPosition: 'right',
		navigationTooltips: ['Article 1', 'Article 2', 'Article 3', 'Article 4', 'Article 5'],

		verticalCentered: false
	});

    var map;
	map = new GMaps({
        el: '#map',
        lat: 46.14827,
        lng: -1.1565533,
    });
	map.addMarker({
        lat: 46.1476461,
        lng: -1.1549414999999499,
        title: 'Universite La Rochelle',
        infoWindow: {
          content: '<p>Universite La Rochelle</p>'
        }
      });

	var $svg = $('#Calque_1').drawsvg();
	$svg.drawsvg('animate');
};
