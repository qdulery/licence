$(document).ready(init) ;

function init()
{
    exo1();
    exo2();
    exo3();
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

function exo3() {
       
 //3_1
    $("#ulEx1").click(function() {
        $("#ulEx1 li").first().appendTo("#ulEx1");
    });
    
    
      //3_2
    $("#ulEx2 li").click(function() {
        $(this).appendTo("#ulEx2");
    });
    
    //3_3
    $("#olEx3 li").click(function() {
        $(this).prev().before($(this));
    })
    
    
     //3_4
    ajoutFleches();
    
    
    //3_4
function ajoutFleches() {
    $("#olEx4 li").not(":first").append("<span class=\"control monte\">↑</span>");
    $("#olEx4 li").not(":last").append("<span class=\"control descend\">↓</span>");
    $(".monte").click(monte);
    $(".descend").click(descend);
}

function monte() {
    $(this).parent().prev().before($(this).parent());
    $("#olEx4 li span").remove();
    ajoutFleches();
}

function descend() {
    $(this).parent().next().after($(this).parent());
    $("#olEx4 li span").remove();
    ajoutFleches();
}
    
    
    //3_5
    $("#ulEx2_5 li").click(function(){
        $(this).appendTo("#olEx2_5");
        $(this).off("click");
        // ou autre solution
        // $(this).remove().appendTo("#olEx2_5");
        $(this).click(function(){
            $("#olEx2_5 li").removeClass("relief");
            $(this).addClass("relief");
            $(this).children($("span")).remove();
            $(this).append("<span class=\"control supprime\">X</span>");
            $(".supprime").click(function() {
                $(this).parent().remove();
            })
        })
    });
    
}
  