/**
 * Created by qdulery on 30/11/2017.
 */


/**
 * Created by qdulery on 29/11/2017.
 */


$(document).ready(init);

function init() {

    var dataParis="https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&rows=181&facet=arrondissement";

    envoiAjax(dataParis, "bordeaux").done(traitementCafe);;

}

function envoiAjax(url,param){
    return $.ajax({
        url: url,
        dataType: 'jsonp'
    })
        .always(function () {
            $("."+param).find("img").remove();
        })
        .fail(function () {
            console.log("fail");
        });
}

function traitementCafe(data){
    console.log(data.records);
    var ul = $("main ul");

    $.each(data.records, function(i, e){
        console.log(e.fields.nom_du_cafe);
        var li = $("<li/>").attr("data-arrondissement", e.fields.arrondissement).text(e.fields.nom_du_cafe).appendTo(ul);
        li.mouseover(clickLi);
    });
}

function clickLi(){
    var nomCafe = $(this).text();
    nomCafe = encodeURIComponent(nomCafe);

    var url= "https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&rows=181&facet=arrondissement&refine.nom_du_cafe="+nomCafe;
    envoiAjax(url, "aside").done(traitementClickLi);

    var arrondissement = $(this).attr("data-arrondissement");
    var url2= "https://opendata.paris.fr/api/records/1.0/search/?dataset=liste-des-cafes-a-un-euro&rows=181&facet=arrondissement&refine.arrondissement="+arrondissement;
    envoiAjax(url2, "aside").done(traitementClickLi2);
}


function traitementClickLi(data) {
    $("aside p").text("")
    var infos = $("aside");
    var arrondissement= $("<p/>").text(data.records[0].fields.arrondissement).appendTo(infos);
    var nom_du_cafe= $("<p/>").text(data.records[0].fields.nom_du_cafe).appendTo(infos);
    var adresse= $("<p/>").text(data.records[0].fields.adresse).appendTo(infos);
    var prix= $("<p/>").text(data.records[0].fields.prix_comptoir).appendTo(infos);
}

function traitementClickLi2(data){
    $("section p").text("");
    var infos = $("section");
    var arrondissement= $("<p/>").text("Arrondissement : " + data.records[0].fields.arrondissement).appendTo(infos);
    var nombre_cafes= $("<p/>").text("Nombre cafes : " + data.nhits).appendTo(infos);
    var liste_cafes= $("<p/>").text("Liste des cafes :").appendTo(infos);
    $.each(data.records, function(i, e){
        var nom_cafe= $("<p/>").text(e.fields.nom_du_cafe).appendTo(infos);
    });
}
