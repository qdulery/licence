$(document).ready(init) ;

function init()
{
    exo1();
}

function exo1() {
    // 1_1
    $("#select1 span").addClass("relief");
    // 1_2
    $("#select2 .option").hide(1000);
}

function exo2() {
    // 2_1
    $("#ex1_1").click(function() {
        $("#ex1_1 li").first().hide();
    });
    
    $("#Reaff1").click(function() {
        $("#ex1_1 li").first().show();
    });

    //2_2
    $("#ex1_2 li").click(function() {
        $(this).hide();
    });
    $("#Reaff2").click(function() {
        $("#ex1_2 li").show();
    });
    
    //2_3
    $("#ex1_3 li").click(function() {
        var c=$(this).attr("class");
        $("#ex1_3 ."+c).hide();
    });
    $("#Reaff3").click(function() {
        $("#ex1_3 li").show();
    });
    
    //2_4
    $("#ex1_4 li").click(function() {
        var c=$(this).attr("class");
        $("#ex1_4 ."+c).addClass("relief");
    });
    $("#Reaff4").click(function() {
        $("#ex1_4 li").removeClass("relief");
    });
}