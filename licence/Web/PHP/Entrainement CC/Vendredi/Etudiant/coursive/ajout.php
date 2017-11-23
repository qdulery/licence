<?php
	
include "connexion.php";
$connexion=connexionBd();

$requete = "SELECT * FROM spectacle";      
$rep = $connexion->query($requete);
$listeSpec=$rep->fetchAll(PDO::FETCH_ASSOC);

$requeteType="SELECT * FROM typespectacle";
$repType=$connexion->query($requeteType);
$typeSpec=$repType->fetchAll(PDO::FETCH_ASSOC);



if(isset($_POST['send']))
{

        $nom=$_POST['nom'];
        $compagnie=$_POST['compagnie'];
        $numCat=$_POST['numCat'];
        $date=$_POST['date'];
        $nbrDate=$_POST['nbrDate'];
        $description=$_POST['description'];
        $nomDossierPhotos=$_POST['nomDossierPhotos'];
        $image=$_FILES['image']['name'];

     $requetePrepa=$connexion->prepare("insert into spectacle (nom, compagnie, type, date, plusieursDate, description, photos, nomDossierPhotos) values (:nom,:compagnie,:type,:date, :plusieursDate, :description, :photos, :nomDossierPhotos);  ");
        $requetePrepa->bindParam(':nom',$nom);
        $requetePrepa->bindParam(':compagnie',$compagnie);
        $requetePrepa->bindParam(':numCat',$numCat);
        $requetePrepa->bindParam(':date',$date);
        $requetePrepa->bindParam(':nbrDate',$nbrDate);
        $requetePrepa->bindParam(':description',$description);
        $requetePrepa->bindParam(':nomDossierPhotos',$nomDossierPhotos);
        $requetePrepa->bindParam(':image',$image);
        $test=$requetePrepa->execute();
     if($test==true)
     {
        move_uploaded_file($_FILES["photo/:nomDossierPhotos"]["tmp_name"], "../$image");
         print('Inserer dans la base !');
     }else{
        print_r('Pas inserer');
     }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
	
	<title>Formulaire</title>

	</head>
<body>


<h1> Ajout d'un spectacle</h1> 

<form action="ajout.php" method="POST" enctype="multipart/form-data">
	<fieldset>
	<legend>Ajout d'un spectacle</legend>
	    <p>
            <label>nom : </label> 
            <input type="text" name="nom">
        </p>
	    <p>
            <label>compagnie : </label> 
            <input type="text" name="compagnie">
        </p>
        <p>
            <label>type : </label>
            <select name="numCat">
                <?php foreach ($typeSpec as $nom => $cat): ?>
                    <option value="<?= $cat['idSpec'] ?>"><?= $cat['type'] ?></option>
                <?php endforeach; ?>  
            </select>
        </p>
        <p>
            <label>date : </label> 
            <input type="date" name="date">
        </p>
        <p>
            <label>plusieurs date : </label>
            <select name="nbrDate">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
            </select>
        </p>
        <p>
            <label>description : </label> 
            <input type="text" name="description">
        </p>
        <p>
            <label>nom dossier photo : </label> 
            <input type="text" name="nomDossierPhotos">
        </p>
		<p>  
            <label for="image">Image </label>
            <input accept="image" type="file" name="image" >
        </p>
    </fieldset>
	<p><input type="submit" value="Envoyer" name="send"/></p>
				
</form>




</body>
</html>