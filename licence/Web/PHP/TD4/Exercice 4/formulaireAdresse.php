<?php
session_start();
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['mail'] = $_POST['mail'];
?>
<html>
    <head>
        <title>TD4-Formulaire</title>
    </head>
    <body>
        <form method="post" action="enregistrement.php" >
            <fieldset>
                <legend>Informations complémentaires</legend>
                <p>
                    <label>Adresse</label>
                    <input type="text" name="adresse" />
                </p>
                <p>
                    <label>Code Postal</label>
                    <input type="text" name="cp" />
                </p>
                <p>
                    <label>Ville</label>
                    <input type="text" name="ville" /></p>
                <p>
                    <input type="submit" name="send" value="Envoyer"/>
                </p>
            </fieldset>
        </form>
    </body>
</html>