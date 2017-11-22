<?php
    include "srilanka.php";
    include "fonctions.php";

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
        }
        $tableauCaracteristique=array(
            "lat" => $lat,
            "lon" => $lon,
            "pop" => $pop,
            "img" => $img
        );
        $srilanka[$ville]=$tableauCaracteristique;
        print_r($srilanka);
    }
?>

<html>
    <head>
        <title>TP2</title>
    </head>
    <body>
        <h2>Ajout d'une ville</h2>
        <form method="post" action="" enctype="multipart/form-data">
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
                <input type="file" name="img" accept="image/jpg" />
            </p>
            <p>
                <input type="submit" value="Ajouter ville" name="submit" />
            </p>
        </form>
        
        <p>Distance entre les villes : <?= distance($srilanka); ?></p>
    </body>
</html>