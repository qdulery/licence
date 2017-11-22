<?php
session_start();
?>
<html>
    <head>
        <title>TD4-test.php</title>
    </head>
    <body>
        
        <?php if( (isset($_SESSION['nom'])) && (isset($_SESSION['prenom'])) && (isset($_SESSION['age'])) ):?>
        <p>Nom : <?= $_SESSION['nom']?></p>
        <p>Prenom : <?= $_SESSION['prenom']?></p>
        <p>Age : <?= $_SESSION['age']?></p>
        <?php else: ?>
            <p>Bonjour... Aucune session</p>
        <?php endif ?>
    </body>
</html>