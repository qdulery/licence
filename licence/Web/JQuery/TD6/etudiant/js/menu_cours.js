/**
 * Created by qdulery on 06/12/2017.
 */

$(document).ready(init());

function init(){
    $.fn.menu=function(options){
        return this.each(function(){
            var defauts={
                "vitesseSlideUp":"slow",
                "vitesseSlideDown":"fast",
                "nameSousListe":"sousListe",
                "callback":null,
                "couleurTexte":"black",
                "couleurFond":"#FD6C9E"
            }; // Param par défaut

            var param = $.extend(defauts,options); //Fusionne les paramètres par défaut avec les param mis en options

            $("."+param.nameSousListe).hide();

            if(param.callback){
                param.callback("ok");
            }

            $(".sousListe").hide();

            $(this).find("a").mouseover(function(){
                $(this).parent().siblings().find('.sousListe').slideUp();
                $(this).parent().find('ul').slideDown();
            });

            $(this).css("Color",param.couleurTexte);
            $(this).css("background-color",param.couleurFond);

        });
    };
    $(".menu").menu({"callback":function(data){
        console.log("fonction de callback " + data);}
    });
}