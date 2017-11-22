<?php
session_start();
$_SESSION['nom'] = 'Dulery';
$_SESSION['prenom'] = 'Quentin';
$_SESSION['age'] = '20';
?>

<html>
    <head>
        <title>TD4</title>
    </head>
    <body>
        <p><a href="page1.php">Lien vers page "Page1.php"</a></p>
    </body>
</html>