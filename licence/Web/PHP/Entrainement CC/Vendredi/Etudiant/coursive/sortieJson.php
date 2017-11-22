<?php
    ini_set('display_errors', 1);    
    include("connexion.php");
    $connexion=connexionBd();
   
 
    $nomId="SELECT * FROM spectacle";
    $res2=$connexion->query($nomId);
    $res2=$res2->fetchALL(PDO::FETCH_ASSOC);
    //print_r($res2);
 
 
    if(isset($_POST["send"])){
        $numCat=htmlspecialchars($_POST["numCat"]);
        $sql="SELECT * FROM spectacle WHERE numCat=$numCat";
        $resultats=$connexion->query($sql);
        $resultats=$resultats->fetchALL(PDO::FETCH_ASSOC);
        //print_r($resultats);
    }    
    else{
        echo "Bonjour !";
    }
 
?>
 
 <html>
<form action="sortieJson.php" method="post" >
        <p>Choisis un sujet :</p>
        <p>
            <select name="numCat">
                <option>Choisis bien </option>                      
                <?php foreach($res2 as $key => $value):?>
                            <option value="<?=$value['id']?>"><?=$value['nom']?></option>
                        <?php endforeach ?>
                        </select>  
                   
                   
                    <input type="submit" value="Valider" name="send" />
                   
                    </p>
                     
                </form>
</html>