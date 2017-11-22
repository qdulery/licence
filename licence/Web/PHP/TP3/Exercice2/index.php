<?php
include "connexion.php";
$connexion=connexionBd();
$requete = "SELECT * FROM villes";
$rep = $connexion->query($requete);
$listeVilles=$rep->fetchAll(PDO::FETCH_ASSOC);


foreach($listeVilles as $ville): ?>
    <ul>
        <li><?= $ville['nom'] ?></li>
        <ul>
            <li>lat : <?= $ville['lat'] ?></li>  
            <li>lon : <?= $ville['lon'] ?></li>  
            <li>pop : <?= $ville['pop'] ?></li>  
            <img src="<?= $ville['img'] ?>"/>         
        </ul>
    </ul>
<?php endforeach; ?>