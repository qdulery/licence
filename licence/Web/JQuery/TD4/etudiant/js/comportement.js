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
			alert('Erreur chargement');
		},
		success: function(data){
			alert(data);
       		$("#modif").text(data);
		}
    });
}
