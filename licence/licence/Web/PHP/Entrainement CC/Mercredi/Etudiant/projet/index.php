<?php

include "connexion.php";
$connexion=connexionBd();

if(isset($_POST["send"])){
    $Sujet=$_POST['numSujet'];
    if($Sujet=="0")
        $requete = "SELECT * FROM projets LIMIT 6;";
    else
        $requete = "SELECT * FROM projets WHERE numSujet=$Sujet;";
}else{
    $requete = "SELECT * FROM projets LIMIT 6;"; 
}     
$rep = $connexion->query($requete);
$listeProjets=$rep->fetchAll(PDO::FETCH_ASSOC);

$requete2 = "SELECT * FROM sujets";      
$rep2 = $connexion->query($requete2);
$listeSujets=$rep2->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title></title>

        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>



        <div id="wrapper"> 
            <header>
                <h1>//COLLECTION</h1>

                <form action="index.php" method="post" >
                    <p><label>Sort : by</label>
                        <select name="numSujet">
                            <option value="0">All</option>
                            <?php foreach ($listeSujets as $nom => $cat): ?>
                                <option value="<?= $cat['id'] ?>"><?= $cat['nom'] ?></option>
                            <?php endforeach; ?>  

                        </select>	
                    
                    
                    <input type="submit" value="GO" name="send" />
                    
                    </p>
                     
                </form>

            </header>




            <main>
                <ul>
                    <?php foreach($listeProjets as $id => $value): ?>
                    <li>
                        <article> 
                            <img src="<?= $value['adresseMiniature'] ?>" />
                            <h2><?= $value['description'] ?></h2>
                            <h3><?= $listeSujets[$value['numSujet']-1]['nom'] ?></h3>
                            <a href="<?= $value['url'] ?>" target="_blank">LAUNCH PROJECT </a>
                        </article>
                    </li>
                    <?php endforeach; ?>
                </ul>




            </main>



         


            <footer>
                <p>Collection  :</p>
                     
                   
            </footer>
        </div>

    </body>
</html>
