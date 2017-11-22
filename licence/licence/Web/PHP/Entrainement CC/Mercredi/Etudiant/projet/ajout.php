<?php
	
    include "connexion.php";
$connexion=connexionBd();
$requete = "SELECT * FROM sujets";      
$rep = $connexion->query($requete);
$listeSujets=$rep->fetchAll(PDO::FETCH_ASSOC);


//////////////// CA MARCHE PUTAIN !!!!!!!!!!!! ///////////////////////

if(isset($_POST['send']))
{

        $description=$_POST['description'];
        $url=$_POST['url'];
        $numSujet=$_POST['numSujet'];
      $image=$_FILES['image']['name'];

     $requetePrepa=$connexion->prepare("insert into projets (description, url, adresseMiniature, numSujet) values (:description,:url,:image,:numSujet);  ");
        $requetePrepa->bindParam(':description',$description);
        $requetePrepa->bindParam(':url',$url);
        $requetePrepa->bindParam(':numSujet',$numSujet);
        $requetePrepa->bindParam(':image',$image);
       $test=$requetePrepa->execute();
     if($test==true)
     {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../$image");
         print('Inserer dans la base !');
     }
}
//////////////////////////// VICTOIRE /////////////////////////////
 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
	
	<title>Formulaire</title>

	</head>
<body>


<h1> Administration des projets</h1> 

<form action="ajout.php" method="POST" enctype="multipart/form-data">
	<fieldset>
	<legend>Ajout d'un projet</legend>
	        <p>
     <label for="description">description : </label> 
    <input type="text" name="description">
    </p>
	
                <p>
     <label for="url">url : </label> 
    <input type="text" name="url">
    </p>
				
        
         
          <p>  
    <label for="image">Image </label>
    <input accept="image" type="file" name="image" >
    <p>
              <label for="numSujet">numSujet :</label>
    		<select name="numSujet">
                <?php foreach ($listeSujets as $nom => $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['nom'] ?></option>
                <?php endforeach; ?>  
            </select>	
        </p>
</fieldset>
	<p><input type="submit" value="Envoyer" name="send"/></p>
				
</form>




</body>
</html>