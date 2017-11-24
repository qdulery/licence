/**
 * Created by qdulery on 24/11/2017.
 */

$(document).ready(init);

function init() {
    $("#changer").click(function(){
        /*
        $.ajax({
            url: 'traitement.php',
            type: 'GET',
            success: function(data){
                $("#article").text(data);
            }
        });
        */

        $.get('num.php',traiterAjax );
        function traiterAjax(data) {
            var numero= data;
            $.get('nom.php',{
                n : numero
            }, affichageNom
            );
            $.get('Commentaire.php',{
                    n : numero
                }, affichageCom
            );
            $.get('photo.php',{
                    n : numero
                }, affichagePhoto
            );
        }

        function affichageNom(data){
            $('#modele').text(data);
        }
        function affichageCom(data){
            $('#article').text(data);
        }
        function affichagePhoto(data){
            $('#imgPhone').attr("src", "Photos/"+data);
        }
    });
}
