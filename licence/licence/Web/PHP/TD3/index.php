<?php
include 'connexion.php';
$connexion=connexionBd();

//Création de la requete
$requete="SELECT * FROM Contacts";
$requete2="SELECT * FROM Contacts WHERE ville='La Rochelle'";
$requete3="SELECT * FROM Contacts WHERE nom='Dulery' and prenom='Quentin'"
$contactExiste=$connexion->query($requete3);
if($contactExiste->rowCount()==0){

	$requeteCreation="INSERT INTO `Contacts` VALUES (NULL, 'Dulery', 'Quentin', 'avenue du lazaret', '17000', 'La Rochelle', '4847', 'qdulery@gmail.com', '1997');";
	$reqInsertion=$connexion->exec($requeteCreation);
}

//Envoi de la requete
$rep=$connexion->query($requete);
$rep2=$connexion->query($requete2);

//Récup des données
$listeContacts=$rep->fetchAll(PDO::FETCH_ASSOC);
$listeContacts2=$rep2->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
	<head>
		<title>TD3</title>
	</head>
	<body>
		<h2>Ex1 - Mes contacts</h2>
		<table>
		<?php foreach($listeContacts as $unContact): ?>
			<tr>
				<?php foreach($unContact as $info): ?>
					<td><?= $info ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</table>

		<h2>Ex2 - Contacts de La Rochelle</h2>
		<table>
		<?php foreach($listeContacts2 as $unContact2): ?>
			<tr>
				<?php foreach($unContact2 as $info2): ?>
					<td><?= $info2 ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</table>

		<h2>Ex3 - Requete d'insertion</h2>
		<table>
		<?php foreach($listeContacts as $unContact): ?>
			<tr>
				<?php foreach($unContact as $info): ?>
					<td><?= $info ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</table>
	</body>
</html>