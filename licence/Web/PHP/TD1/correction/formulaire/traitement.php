<?php
print_r($_POST);
$aff="";

if(isset($_POST["send"]) )
{
    if (!empty($_POST["nom"])&& !empty($_POST["prenom"])&& !empty($_POST["age"]))
    {

        $nom=htmlspecialchars($_POST["nom"]);               // strip_tags()
        $prenom=htmlspecialchars($_POST["prenom"]);
        $age=htmlspecialchars($_POST["age"]);
        $email=htmlspecialchars($_POST["mail"]);
        //V2
        $decoupe=explode("-",$age);
        $age=date("Y")-$decoupe[0];
        
       


        $aff= "Bonjour $nom $prenom. Vous avez $age ans.";

    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Complétez tous les champs');";
        echo "window.history.back();";
        echo "</script>";
    }
}
else {
    header("location:index.html");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Votre profil</title>
        <link rel="stylesheet" type="text/css" href="demo.css" />

    </head>
    <body>

        <h2><?=$aff; ?></h2>
        <p>Votre email est <?=$email?></p>

       <?php if(isset($_POST["sport"])):?>
        <p>Mes compétences sont :</p>
        <ul>
            <?php
                foreach ($_POST["sport"] as $value): ?> 
                <li><?=$value?></li>
                <?php endforeach; ?>
           
        </ul>
         <?php endif; ?>
    </body>
</html>
