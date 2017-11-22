<?php
	//code php
    print_r($_POST);


    $aff="";
    
   if(isset($_POST["send"]))
   {
        if (!empty($_POST["nom"])&& !empty($_POST["prenom"])&& !empty($_POST["date"]))
        {

            $nom=htmlspecialchars($_POST["nom"]);             
            $prenom=htmlspecialchars($_POST["prenom"]);
            $date=htmlspecialchars($_POST["date"]);
            $email=htmlspecialchars($_POST["mail"]);
            
            $year=date('Y'); 
            $age=$year - $date;

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
    else 
    {
        header("location:index.html");
    }

    
?>




<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
     <title>Votre profil</title>
      
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
