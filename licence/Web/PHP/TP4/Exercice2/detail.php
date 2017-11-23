<?php
include "connexion.php";
$connexion=connexionBd();

$nomVille = $_GET['ville'];
$requete = "SELECT * FROM villes WHERE nom='$nomVille'";
$rep = $connexion->query($requete);
$infosVille=$rep->fetchAll(PDO::FETCH_ASSOC);

setcookie("villes[ville]",$_GET['ville']);
?>

<html>
    <head>
        <title>TP4-Ex2</title>
    </head>
    <body>
        <h2><?= $infosVille[0]['nom'] ?></h2>
        <ul>
            <li>lat : <?= $infosVille[0]['lat'] ?></li>
            <li>lon : <?= $infosVille[0]['lon'] ?></li>
            <li>pop : <?= $infosVille[0]['pop'] ?></li>
            <img src="<?= $infosVille[0]['img'] ?>" />
        </ul>
        
        <a href="index.php"><button>Retour page d'accueil</button></a>
    </body>
</html>