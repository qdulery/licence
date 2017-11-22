<html>
    <head>
        <title>TD4-test.php</title>
    </head>
    <body>
        <?php if( (isset($_GET['produit'])) && (isset($_GET['prix'])) ):?>
        <p>Le produit : <?= $_GET['produit']?> coûte <?= $_GET['prix']?> €</p>
        <?php else: ?>
        <?php header('Location:info.php'); ?>
        <?php endif ?>
    </body>
</html>