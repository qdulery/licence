<?php
/**
 * Created by PhpStorm.
 * User: qdulery
 * Date: 24/11/2017
 * Time: 10:57
 */


function connexionPDO($hote,$username,$mdp,$bd) {
    try {
        $connex= new PDO('mysql:host='.$hote.';dbname='.$bd, $username, $mdp);
        $connex->exec("SET CHARACTER SET utf8");
        //Gestion des accents
        return $connex;
    } catch(Exception $e) {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
        return null;
    }
}

$connexion=connexionPDO("localhost","root","root","mobilephones");



if(isset($_GET['n'])){
    $num=$_GET['n'];
    //recuperation du contenu
    $requete="select Commentaire from telephones where num=$num";
    $tab=$connexion->query($requete);
    $resultat = $tab->fetchAll(PDO::FETCH_OBJ);


    echo $resultat[0]->Commentaire;
}