<?php
include "utile.php";
include "connexion.php";
$connexion=connexionBd();
$numCat = $_GET['cat'];
if($numCat=="all")
    $requete = "SELECT * FROM article";
else
    $requete = "SELECT * FROM article WHERE id_categorie=$numCat";
    
$rep = $connexion->query($requete);
$listeProduit=$rep->fetchAll(PDO::FETCH_ASSOC);

setcookie("categorie[cat]",$_GET['cat'],time()+3600);
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop</title>

</head>
<body>
<!-- DEBUT de la page -->
<?php
    require("header.php");
?>

	<section>
		<header>
					<h2>Catégorie n° <?= $numCat ?></h2>
		</header>
        
            <ul id = "produit-list">
                <?php foreach($listeProduit as $p): ?>
                    <li class="product">
                        <h3><?= $p['designation'] ?></h3>
                        <img src=" <?= $p['img_article'] ?>" />
                        <h3><?= $p['prix'] ?> €</h3>
                        <p><?= tronquer_texte($p['description']) ?></p>
                        <a href="vue_produit.php?article=<?= $p['id_article'] ?>"> Voir les détails</a>
                    </li>
                <?php endforeach; ?>
                
			</ul>
            
				
	</section>

<?php
    require("footer.php");
?>


</body>
</html>