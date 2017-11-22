<?php

$appareilPhoto=array("appareil 1"=>array("nom"=>"Compact Canon PowerShot G7X Mark II","prix"=>599),
                     "appareil 2"=>array("nom"=>"Appareil photo compact Canon PowerShot G5X","prix"=>729),
                     "appareil 3"=>array("nom"=>"Compact Panasonic Lumix DMC-TZ101","prix"=>610));

$appSup600=0;

?>

<!DOCTYPE html>
<html>
<head>


        <title>Untitled Document</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
    </head>
    <body>
        <!--Affichage -->
        <?php foreach($appareilPhoto as $id=>$value): ?>
            <?= $id ?> : <?= $value['nom'] ?> ===> <?= $value['prix'] ?> €<br>
            <?php if($value['prix']>600){
                $appSup600+=1;
            } ?>

        <?php endforeach; ?>
        <p>Nombre appareil photo suppérieur à 600 € : <?= $appSup600 ?></p>


        <!--Nombre d'appareil superieur à 600€ -->
      



    </body>
</html>
