<?php
include "connexion.php";
$connexion=connexionBd();

setcookie("villes");
$ville = $_COOKIE['villes']['ville'];

$requete = "SELECT * FROM villes WHERE nom='$ville'";
$rep = $connexion->query($requete);
$infosVille=$rep->fetchAll(PDO::FETCH_ASSOC);



?>

<html>
    <head>
        <title>TP4-Ex2</title>
    </head>
    <body>
        <h2>Selectionner ville : </h2>
        <ul>
            <li><a href="detail.php?ville=Negombo">Lien vers la ville Negombo</a></li>
            <li><a href="detail.php?ville=Anuradhapura">Lien vers la ville Anuradhapura</a></li>
            <li><a href="detail.php?ville=Trincomalee">Lien vers la ville Trincomalee</a></li>
        </ul>
        
        <h2>Villes déjà selectionnées : </h2>
        <ul>
            <li><?= $infosVille[0]['nom'] ?></li>
                <ul>
                    <li>lat : <?= $infosVille[0]['lat'] ?></li>
                    <li>lon : <?= $infosVille[0]['lon'] ?></li>
                    <li>pop : <?= $infosVille[0]['pop'] ?></li>
                    <img src="<?= $infosVille[0]['img'] ?>" />
                </ul>
        </ul>
    </body>
</html>