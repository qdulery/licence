<?php
session_start();
$_SESSION['adresse'] = $_POST['adresse'];
$_SESSION['cp'] = $_POST['cp'];
$_SESSION['ville'] = $_POST['ville'];
?>

<html>
    <head>
        <title>TD4-Formulaire</title>
    </head>
    <body>
        <p><?= $_SESSION['nom'].' '.$_SESSION['prenom']?></p>
        <p><?= $_SESSION['mail']?></p>
        <p><?= $_SESSION['cp'].' '.$_SESSION['ville']?></p>
    </body>
</html>