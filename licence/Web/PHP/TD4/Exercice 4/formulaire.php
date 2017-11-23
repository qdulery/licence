<html>
    <head>
        <title>TD4-Formulaire</title>
    </head>
    <body>
        <form method="post" action="formulaireAdresse.php" >
            <fieldset>
                <legend>Informations personnelles</legend>
                <p>
                    <label>Nom</label>
                    <input type="text" name="nom" />
                </p>
                <p>
                    <label>Prenom</label>
                    <input type="text" name="prenom" />
                </p>
                <p>
                    <label>Mail</label>
                    <input type="text" name="mail" /></p>
                <p>
                    <input type="submit" name="send" value="Envoyer"/>
                </p>
            </fieldset>
        </form>
    </body>
</html>