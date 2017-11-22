$(document).ready(init);

function init() {
    $( "#click" ).click(function() {
    	modification();
    });

};

function modification(){
	/*
	//Test 1
	$("#modif").load( "exo1.html" );
    console.log("ok");

    //Test 2
    $.get("exo2.php",{
     	prenom:"Quentin",
       	nom: "Dulery"
    },
    function (data) {
       	alert(data);
       	$("#modif").text(data);
    });

    //Test 3
    $.ajax({
    	url: 'exo2.php',
    	type: 'GET',
    	data: {
    		prenom: "Quentin",
    		nom: "nom"
    	},
    	error: function(){
			alert('Erreur chargement');
		},
		success: function(data){
			alert(data);
       		$("#modif").text(data);
		}
    });
    */

    //Test 4
    $.ajax({
    	url: 'playlist.xml',
    	type: 'GET',
    	dataType: 'xml',
    	error: function(){
    		console.log("non");
		},
		success: function(xml){
            console.log("oui");
    		var donnee= "";
            $(xml).find('track').each(function(){
                var location = $(this).find('location').text();
                var title =$(this).find('title').text();
                var creator =$(this).find('creator').text();
                donnee += "<tr><td>"+location+"</td><td>"+title+"</td><td>"+creator+"</td></tr>";
            });
            $("#modif").html(donnee);
        }
    });
}
