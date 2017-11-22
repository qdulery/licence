<?php
           
require('connexion.php');
$connexion=connexionBd();

$idSpec= $_GET['id']-1;
$requete="SELECT * FROM spectacle;";
$rep=$connexion->query($requete);
$listeSpect=$rep->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Untitled Document</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="wrap">


            <header>
             
                <h1><a href="index.php"><img src="img/logo.png" alt="la coursive la rochelle"></a></h1>

            </header>

            <main>

               <!--contenu-->
                <h1 class="jaune">
                    <?= $listeSpect[$idSpec]['nom'] ?>
                </h1>
                <p>
                    <?= $listeSpect[$idSpec]['description'] ?>
                </p>
              


            </main>








        </div>



    </body>
</html>
