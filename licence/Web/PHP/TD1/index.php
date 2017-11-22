<?php

//Test
    $date = date('d/m/y');
    echo 'Date : '.$date;

//EXO 1
    $TVA = 0.2;
    $prix = 150;
    $nombre = 10;
    $prixHT = $prix * $nombre;
    $prixTT = $prixHT + $prixHT * $TVA;

//EXO2
    $nbre = 20;
    $res = 0;
    for($i=1; $i<=$nbre; $i++){
        $res = $res + $i;
    }


//EXO3
    $nbArticle=4;

//EXO4
    $age=20;
    $reduc=0;
    $jour=2;

    if($age<14) $prixCinema=4;
    else{
        if($age<18)
            $prixCinema=5;
        elseif($age>=18){
            if($jour==1)
                $prixCinema=6;
            else
                $prixCinema=8;
        }
    }

//EXO5
    $note=[10,15,16,8,12,3];

    foreach ($note as $value) {
        $total = $total + $value;
    }
    $moyenne = $total / sizeof($note);


//EXO6
    $traduction = array(
        "Anglais" => "Français", 
        "January" => "Janvier", 
        "Fébruary" => "Février", 
        "March" => "March"
    );


?>



<!DOCTYPE html>
<html>

    <head>
        <title>Exercices php</title>
        <meta charset="utf-8"/>

    </head>

    <body>
        <!--TEST -->
       
        <p></p>

        <!--EXO1 -->
        <h2>Exercice 1</h2>
        <h3>Calcul sur les variables</h3>
        <p>Prix HT des articles : <?= $prixHT ?></p>
        <p>Prix TTC des  articles : <?= $prixTT ?></p>


        <!--EXO2 -->
        <h2>Exercice 2</h2>
        <p>La somme des nombre de 1 à  est égal à <?= $res ?></p>
        
        <!--EXO3 -->
        <h2>Exercice 3</h2>
        <?php for($i=1; $i<=$nbArticle; $i++){ ?>
        <article>
            <header>
                <h3>Titre <?= $i ?></h3>
                <p>Le <?= $date ?></p>
            </header>
            <p>1 paragraphe de lorem ipsum</p>
        </article>
        <?php } ?>
        
        <!--EXO4 -->
        <h2>Exercice 4</h2>
        <p>Avec les valeurs de simulation suivantes age: jour: et reduction :  alors ma place de cinéma coûtera <?= $prixCinema ?>€</p>
        
        <!--EXO5-->
        <h2>Exercice 5</h2>
        
        <ul>
        <?php for($i=0; $i<sizeof($note); $i++){ ?>
                <li><?= $note[$i] ?></li>
        <?php } ?>
        </ul>
        <p>la moyenne est de <?= $moyenne ?></p>
        
        
        
        <!--EXO6-->
        <h2>Exercice 6</h2>
       
        <table>
            <?php
                foreach ($traduction as $key => $value) {
                    echo '<tr>';
                    echo '<td>'.$key.'</td>';
                    echo '<td>'.$value.'</td>';
                    echo '</tr>';
                }
            ?>
        </table>




    

    </body>

</html>