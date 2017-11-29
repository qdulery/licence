/**
 * Created by qdulery on 29/11/2017.
 */

var map;

$(document).ready(init);

function init() {

    map = new GMaps({
        div: '#carte',
        lat: 44.8404400,
        lng: -0.5805000
    });

    var jardinBordeaux="http://odata.bordeaux.fr/v1/databordeaux/parcjardin/?format=json";

    envoiAjax(jardinBordeaux, "bordeaux").done(traitementJardin);

}

function envoiAjax(url,param){
    return $.ajax({
        url: url,
        dataType: 'jsonp',
        beforeSend: showLoadingImgFn(param)
    })
        .always(function () {
            $("."+param).find("img").remove();
        })
        .fail(function () {
            console.log("fail")
        });
}

function traitementJardin(data){
    var ul = $("h2.bordeaux").next();

    $.each(data.d, function(i){
        var li = $("<li/>").attr("data-id", data.d[i].cle).text(data.d[i].nom_espace_entretien).appendTo(ul);
        map.addMarker({
            lat: data.d[i].y_lat,
            lng: data.d[i].x_long,
            title: data.d[i].nom_espace_entretien,
            mouseover: function(e){
                $("ul").find('[data-id='+data.d[i].cle+"]").toggleClass('rouge');
            },
            mouseout: function(e){
                $("ul").find('[data-id='+data.d[i].cle+"]").toggleClass('rouge');
            }
        });
    });
}


function showLoadingImgFn(param){
    var div = $("div."+param);

    var img = $("<img/>").attr('src', 'img/ajax-loader.gif').appendTo(div);
}