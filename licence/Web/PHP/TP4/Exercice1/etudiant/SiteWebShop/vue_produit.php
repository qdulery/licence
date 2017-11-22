<?php
include "utile.php";
include "connexion.php";
$connexion=connexionBd();

if ( !empty($_GET['article']) )
{
    $numArticle = $_GET['article'];
    $requete = "SELECT * FROM article where id_article=$numArticle";
    $rep = $connexion->query($requete);
    $listeProduit=$rep->fetchAll(PDO::FETCH_ASSOC);
}

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
       
        <article id="detail-produit">
            <header>
                <h2><?= $listeProduit[0]['designation'] ?></h2>
            </header>
            
            <img src=" <?= $listeProduit[0]['img_article'] ?>" />
            <p><?= $listeProduit[0]['description'] ?></p>
            <strong><?= $listeProduit[0]['prix'] ?> €</strong>
            
            <form method="post" style="float:right !important">
                <fieldset>
                    <p>Quantité: 
                    <SELECT name="nom" size="1">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <OPTION><?= $i ?></OPTION>
                        <? endfor; ?>
                    </SELECT>
                    <input type="button" value="Ajouter au panier"/></p>
                </fieldset>
            </form>
                            
        </article>
				

<?php
    require("footer.php");
?>


</body>
</html>