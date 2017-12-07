/**
 * Created by qdulery on 07/12/2017.
 */

$(document).ready(init);

function init() {
    $("nav").menu();

    $(".menu").menu({
        "vitesseSlideUp":"fast",
        "vitesseSlideDown":"fast",
        "nameSousListe":"cache",
        "callback":function(data){
            console.log("data : "+data);
        }
    });

}