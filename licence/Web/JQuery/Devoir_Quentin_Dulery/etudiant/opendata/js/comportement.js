$(document).ready(init());

var map; // Création variable 

function init() {
  var url = "http://api.bandsintown.com/events/search?api_version=2.0&app_id=mon_app&location=la%20rochelle,france&radius=10&format=json";
  envoiAjax(url).done(traitementAjax);

  var url = url+"&page=1&per_page=4";
  envoiAjax(url).done(traitementAjax2);
}

function envoiAjax(url){
    return $.ajax({
        url: url,
        type: "GET",
        dataType: "JSONP",
    }).fail(function(){
        alert("Echec");
    });
}

function traitementAjax(data) {
  console.log(data.length);
  console.log(data[0].venue.name);
}

function traitementAjax2(data) {
  var ul = $("ul.concert");

  map = new GMaps({   // Création GMaps
    div: '#map',      // Ou afficher la map
    lat: 46.160329,
    lng: -1.1511390000000574,
    zoom: 12
  });

  $.each(data, function (key, value) {
    var li = $("<li/>").appendTo(ul);

    var h2 = $("<h2/>").text(value.venue.name).appendTo(li);
    var date = new Date(value.datetime);
    var dateString = date.getUTCDate() + "/" + (date.getUTCMonth()+1) + "/" + date.getUTCFullYear() + " à " + date.getUTCHours() + "h" + date.getUTCMinutes();

    var p = $("<p/>").text(dateString).appendTo(li);
    var ol = $("<ol/>").appendTo(li);
    $.each(value.artists, function (key, value) {
      li = $("<li/>").text(value.name).appendTo(ol);
    })

    map.addMarker({                      // Fonction ajout marker
      lat: value.venue.latitude,         // Recuperation latitude
      lng: value.venue.longitude,       // Recuperation longitude
      title: value.venue.name,          // Recuperation nom
      infoWindow: {                     // Info fenetre du marker
        content: "<a href=\"" + value.venue.url + "\">"+ value.venue.url +"</a>"
      }
    });
  })
}
