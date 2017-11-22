<?php
require("personne.php");
include "connexion.php";
$connexion=connexionBd();

//Partie 1
$bob=new Personne(1,"Bob", "Dupond");
var_dump($bob);

//Partie 2
$requete = "SELECT * FROM personne LIMIT 1;";   
$rep = $connexion->query($requete);
$listePersonne=$rep->fetchALL(PDO::FETCH_ASSOC);
var_dump($listePersonne);

//Partie 3
$sql = "SELECT * FROM personne;"; 
$ret = $connexion->query($sql);
$ret->setFetchMode(PDO::FETCH_CLASS, 'Personne');
$objet=$ret->fetch();
var_dump($objet);

//Partie 4
$requeteALL = "SELECT * FROM personne;";   
$repALL = $connexion->query($requeteALL);
$listePersonneALL=$repALL->fetchALL(PDO::FETCH_ASSOC);
var_dump($listePersonneALL);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TD6</title>
	</head>
	<body>
		<?= $bob->afficher(); ?>
	</body>
</html>