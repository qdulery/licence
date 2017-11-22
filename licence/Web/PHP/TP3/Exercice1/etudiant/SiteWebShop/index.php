<?php
include "utile.php";
include "connexion.php";
$connexion=connexionBd();
$requete = "SELECT * FROM article ORDER BY RAND() LIMIT 3";
$rep = $connexion->query($requete);
$listeProduit=$rep->fetchAll(PDO::FETCH_ASSOC);

$datetime = date("d/m/Y");
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
				

				<header>Bienvenue <span class="ss-titre">Nous sommes le <?= $datetime ?> </span></header>
				<p>La boutique en ligne <strong>openSHOP</strong> est un travail réalisé par <em>Thomas Jouannic</em> & <em>Jérome Saunier</em> 
				puis modifié et adapté <strong>au cours de Sites Web Avancés</strong>.</p>
				<p>Dans la partie haute, vous trouverez un moyen pour vous identifiez ou créer un compte si vous n'en n'avez aucun. Le champ de recherche 
				vous permet d'afficher simplement les produits correspondants à ce que vous souhaitez. Vous pouvez aussi naviguer entre les différentes 
				catégorie de produits en cliquant sur celle que vous désirez voir.</p>
				<p>Bonne naviguation !</p>
	</section>
	<section>
		<header>
					<h2>Au hasard...</h2>
		</header>
				<!--Affichage de 3 articles au hasard -->
        
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