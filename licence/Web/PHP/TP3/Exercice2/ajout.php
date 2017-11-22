<?php
include "connexion.php";
$connexion=connexionBd();

if(isset($_POST["submit"]))
    {
        if (!empty($_POST["ville"]) && !empty($_POST["lat"]) && !empty($_POST["lon"]) && !empty($_POST["pop"]))
        {
            //traitement des données pour l'exemple
            $ville=$_POST["ville"];
            $lat= (float) $_POST["lat"];
            $lon= (float) $_POST["lon"];
            $pop= (int) $_POST["pop"];
            $img= "imgSrilanka/".$_FILES['img']["name"];
            
            
            $requete = "INSERT INTO villes (nom, lat, lon, pop, img) VALUES('$ville', '$lat', '$lon', '$pop', '$img')";
            $rep = $connexion->query($requete);
            
            $requete2 = "SELECT * FROM villes";
            $rep2 = $connexion->query($requete2);
            $listeVilles=$rep2->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($listeVilles as $ville): ?>
            <ul>
                <li><?= $ville['nom'] ?></li>
                <ul>
                    <li>lat : <?= $ville['lat'] ?></li>  
                    <li>lon : <?= $ville['lon'] ?></li>  
                    <li>pop : <?= $ville['pop'] ?></li>  
                    <img src="<?= $ville['img'] ?>"/>         
                </ul>
            </ul>
            <?php endforeach;
        }
    
    }
?>

<html>
    <head>
        <title>TP3</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <h2 class="title">Ajout d'une ville</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>Entrer informations</legend>
            <p>
                <label>Ville</label>
                <input type="text" name="ville" />
            </p>
            <p>
                <label>Latitude</label>
                <input type="text" name="lat" />
            </p>
            <p>
                <label>Longitude</label>
                <input type="text" name="lon" />
            </p>
            <p>
                <label>Population</label>
                <input type="text" name="pop" />
            </p>
            <p>
                <label>Image</label>
                <input type="file" name="img" />
            </p>
            <p>
                <input type="submit" value="Ajouter ville" name="submit" />
            </p>
            </fieldset>
        </form>
        
    </body>
</html>