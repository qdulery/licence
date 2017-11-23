<?php
include "connexion.php";
$connexion=connexionBd();

$requete = "SELECT * FROM categorie";

$resultat=$connexion->query($requete);
$categories=$resultat->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["send"]))   
{
    if (isset($_POST["designation"]) && isset($_POST["description"]) && isset($_POST["categorie"]) && isset($_POST["prix"]) && isset($_POST["tva"]))
    {
        $designation=$_POST["designation"];
        $description=$_POST["description"];   
        $categorie=$_POST["categorie"];
        $prix=$_POST["prix"];
        $tva=$_POST["tva"];
        $uploadir="images/magasin/";
        $image= $uploadir.$_FILES["image"]["name"];
    }else{
        $designation="";
        $description="";   
        $categorie="";
        $prix="";
        $tva="";
        $image="";
    }
}

if (!empty($_POST["designation"]) && !empty($_POST["description"]) && !empty($_POST["categorie"]) && !empty($_POST["prix"]) && !empty($_POST["tva"])){
    
    $sql2 = "select * from article where designation ='$designation'";
    $resultat2 = $connexion->query($sql2);
    $article=$resultat2->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($article)){
        $articleExiste = true;
    }else{
        $articleExiste = false;
    }
    
    if($articleExiste){
        echo '<script>alert("Erreur: article déjà présent en base!");</script>';
    }
    
    if(!$articleExiste){
    $sql = "insert into article (id_categorie, designation, prix, tva, description, img_article) values ($categorie, '$designation', $prix, $tva, '$description', '$image')";
        
    $insertion=$connexion->query($sql);
    
    move_uploaded_file($_FILES["image"]["tmp_name"], "../$image");
        
    echo '<script>alert("Article bien ajouté!");</script>';
    }
     
}
?>


<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="styleAdmin.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShopAdMIN</title>

</head>
<body>
<div id="container">
    <h1>Administration du site OpenShop</h1>
    <h2>Ajout d'article</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
       <legend>ajout d'un article</legend>
        <p>
            <label>Designation:</label><input type="text" name="designation" />
        </p>
        <p>
            <label>Description: </label><input type="text" name="description" />
        </p>
        <p>
            <label>Catégorie</label>
            <select name="categorie">
               <?php foreach($categories as $categorie): ?>          
                <option value="<?= $categorie['id_categorie']?>"><?= $categorie['nom'] ?></option>
                <?php endforeach; ?> 
            </select>
        </p>
        <p>
            <label>Prix</label><input type="text" name="prix" />
        </p>
        <p>
            <label>TVA</label><input type="text" name="tva" />
        </p>
        <p>
        <label>Image</label>
        <input type="file" name="image" accept="image/jpg" />
        </p>
        </fieldset>
         <p class="submit">
                <input type="submit" name="send" value="Envoyer" />    
        </p>
</form>

<h2>Insertion d'articles via fichier XML</h2>
</div>

</body>
</html>