<?php
           
require('connexion.php');
require('utile.php');
$connexion=connexionBd();


if(isset($_POST["send"])){
    $cat=$_POST['numCat'];
    if($cat=="0")
        $requete = "SELECT * FROM spectacle;";
    else
        $requete = "SELECT * FROM spectacle WHERE type=$cat;";
}elseif (isset($_GET["click"])) {
    $key=$_GET['id'];
    $requete = "SELECT * FROM spectacle WHERE month(date)=$key;";
}else{
    $requete = "SELECT * FROM spectacle;"; 
} 
$rep=$connexion->query($requete);
$listeSpect=$rep->fetchAll(PDO::FETCH_ASSOC);

$requeteType="SELECT * FROM typespectacle";
$repType=$connexion->query($requeteType);
$typeSpec=$repType->fetchAll(PDO::FETCH_ASSOC);

$month = array(
    1 => 'Janv.',
    2 => 'Févr.',
    3 => 'Mars',
    4 => 'Avr',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juill.',
    8 => 'Août',
    9=> 'Sept.',
    10=> 'Oct.',
    11 => 'Nov.',
    12 => 'Déc.'
); 


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

                <h2>La saison</h2>
                
                
                <nav class="fondJaune">
                    <form action="index.php" method="post" >
                        <select name="numCat">
                            <option value="0">Tous/Toutes</option>
                            <?php foreach ($typeSpec as $nom => $cat): ?>
                                <option value="<?= $cat['idSpec'] ?>"><?= $cat['type'] ?></option>
                            <?php endforeach; ?>  

                        </select>   
                        <input type="submit" value="GO" name="send" />
                    </form>

                    
                    <?php foreach ($month as $key => $value): ?>
                        <a href="index.php?click=1&id=<?= $key ?>"><?= $value ?></a>
                    <?php endforeach; ?>
                    
                </nav>


               <!--contenu-->
         
                <ul>
                    <?php foreach($listeSpect as $key => $val):?>
                        <li>
                            <p class="fondJaune">
                                <?php if($val['plusieursDate']==1): ?>
                                    A partir du 
                                <?php endif; ?>
                                <?= strftime("%d %b %Y", strtotime($val['date'])) ?>
                            </p>
                            <p>
                                <img src="photos/<?= $val['nomDossierPhotos'] ?>/<?= $val['photos'] ?>" />
                            </p>
                            <h3 class="type">
                                <?= $typeSpec[$val['type']-1]['type'] ?>
                            </h3>
                            <h2 class="jaune">
                                <?= $val['nom'] ?> / <?= $val['compagnie'] ?>
                            </h2>
                            <p>
                                <?= tronquer_texte($val['description']) ?>
                            </p>
                            <p>
                                <a href="spectacle.php?id=<?= $val['id'] ?>"><img src="img/plus.png" /></a>
                            </p>
                        </li>
                        <?php endforeach;?>
                    </ul>
              


            </main>








        </div>



    </body>
</html>
