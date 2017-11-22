<?php
if(isset($_FILES['fichier']))
{
    //copie du fichier sur le serveur
    $nomFichier="upload/".$_FILES['fichier']["name"];
    move_uploaded_file($_FILES['fichier']["tmp_name"],$nomFichier );
}
?>
<html>
    <head>
        <title>TP2</title>
    </head>
    <body>
        <h2>Transfert de fichier</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <p>
                <label>Fichier</label>
                <input type="file" name="fichier" accept="image/jpg" />
            </p>
            <p>
                <label>Clic !</label>
                <input type="submit" value="Envoi" name="envoie" />
            </p>
        </form>
        <h3>Clés et valeurs du tableau $_FILES</h3>
        <ul>
        <?php
            foreach($_FILES['fichier'] as $key => $value):
        ?>
            <li><?= $key ?> : <?= $value ?></li>
        <?php endforeach; ?>
        </ul>
    </body>
</html>