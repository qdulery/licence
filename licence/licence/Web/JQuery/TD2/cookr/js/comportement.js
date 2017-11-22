$(document).ready(init) ;

function init()
{
    exo2();
}

function exo1() {
    alert("test");
    $("#image1").css({'width':'200px'});
    $("img").css({'width':'200px'});
    $("img").addClass('discrete');
    $("article img").addClass('discrete');
    $("#wrapper > article img").click(rendreVoyante);
}

function rendreVoyante(){
    $("#wrapper > article img").attr('class', 'discrete');
    $(this).attr('class', 'voyante');
}

function exo2() {
    
}
  