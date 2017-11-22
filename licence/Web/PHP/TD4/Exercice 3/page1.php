<?php
    setcookie("prenom");
    setcookie("nom");
    setcookie("age");
?>

<html>
    <head>
        <title>TD4-test.php</title>
    </head>
    <body>
        
        <?php if( (isset($_COOKIE['personne']['nom'])) && (isset($_COOKIE['personne']['prenom'])) && (isset($_COOKIE['personne']['age'])) ):?>
        <p>Nom : <?= $_COOKIE['personne']['nom']?></p>
        <p>Prenom : <?= $_COOKIE['personne']['prenom']?></p>
        <p>Age : <?= $_COOKIE['personne']['age']?></p>
        <?php else: ?>
            <p>Bonjour... Aucun cookie déclaré</p>
        <?php endif ?>
    </body>
</html>