/**
 * Created by qdulery on 24/11/2017.
 */

$(document).ready(init);

function init() {
    $("#changer").click(function(){
        $.ajax({
            url: 'traitement.php',
            type: 'GET',
            success: function(data){
                $("#article").text(data);
            }
        });
    });
}
