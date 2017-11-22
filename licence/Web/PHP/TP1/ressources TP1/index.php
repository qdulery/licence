<?php

include "srilanka.php";
include "fonctions.php";

//EXO 1-1
$adresse="abourmau@univ-lr.fr";
$mail=explode("@", $adresse);

//EXO 1-2
$clients=array(
    array("Leparc","Paris",35),
    array("Durox","Bordeaux",22),
    array("Dupont","Nantes",27)
);

//EXO 1-3
$departement=array(
    17=>"Charente-Maritime",
    49=>"Pays de la loire",
    44=>"Loire Atlantique",
    69=>"Rhône"
);  
$departement[85]="Vendée";
ksort($departement);


//EXO 1-4
$ville=array();
foreach($srilanka as $key => $caracteristiques){
    $ville[]=$key;
}


//Problème
$gallery = 'galeries';
        if ($encours = opendir($gallery)) {
            while (false !== ($fichier = readdir($encours))) {
                if ($fichier !== '.' && $fichier !== '..') {
                    $img = parcoursDossier(array($gallery.'/'.$fichier.'/images')); // Lien des images
                    $arbo[$fichier] = $img; // Association [NOM_DOSSIER] => lien_image
                }
            }
        }


?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title></title>




        <style type="text/css">
            table{  border : 1px solid black;  
                border-collapse :collapse; 
            }
            td,th {border : 1px solid black; }
        </style>




    </head>
    <body >





        <h2>Exercice 1-1 </h2>
        <p>L'utilisateur est <?=$mail[0]?> et son serveur mail est <?=$mail[1]?>.</p>

        <h2>Exercice 1-2</h2>

        <table>
            <tr>
                <td>Numéro</td>
                <td>Nom</td>
                <td>Ville</td>
                <td>Age</td>
            </tr>
            <?php
                for($i=0; $i<sizeof($clients); $i++):
            ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$clients[$i][0]?></td>
                    <td><?=$clients[$i][1]?></td>
                    <td><?=$clients[$i][2]?></td>
                </tr>
            <?php
                endfor;
            ?>
        </table>
        




        <h2>Exercice 1-3 : Tableau associatif</h2>
        <?php
            foreach ($departement as $key => $value):
        ?>
            <p>Numéro de département de <?=$value?> est <?=$key?></p>
        <?php
            endforeach;
        ?>
        


        <h2>Exercice 1-4 : Tableau associatif</h2>
        <?php
            print_r($srilanka);
        ?>
        <h3>Villes du Sri Lanka</h3>
        <ul>
        <?php
            for($i=0; $i<sizeof($ville);$i++):
        ?>
            <li><?=$ville[$i]?></li>               
        <?php
            endfor;
        ?>    
        </ul>
        

        <h3>Caractéristiques des villes du Sri Lanka</h3>
        <ul>
        <?php
            foreach($srilanka as $key => $caracteristiques):
        ?>
            <li><?=$key?></li> 
            <ul>
                <?php
                    foreach($caracteristiques as $key2 => $value):
                ?>
                    <li><?=$key2?> : <?=$value?></li>
                <?php
                    endforeach;
                ?>
            </ul>
        <?php
            endforeach;
        ?> 
        </ul>

        <p>La moyenne de la population de ces villes est de  <?=moyenne($srilanka)?></p>



        <h2>Exercice 5 : Mensualités</h2>      
        <p>Calcul mensualite 1 : <?= calculMensualite(200000, 5.15/100, 15, 1657)?></p>
        <p>Calcul mensualite 2 : <?= calculMensualite(200000, 5.30/100, 25, 1264)?></p>


        <h2> Galeries photos </h2>

        <?php foreach ($arbo as $nom => $imgs): ?>
            <ul>
              <h2><?=$nom?></h2>
            <?php foreach ($imgs as $lien): ?>
                <li>
                    <a data-caption="" data-fancybox="group" href="<?= $gallery ?>/<?= $nom ?>/images/<?=$lien?>">
                    <img src="<?= $gallery ?>/<?= $nom ?>/thumb/<?=$lien?>" alt="<?= $gallery ?>" /></a>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>  
        
        
        </body>
</html>