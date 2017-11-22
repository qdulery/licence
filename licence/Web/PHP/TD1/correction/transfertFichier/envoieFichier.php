<?php


$aff="";


if(!empty($_POST)){
echo "<pre>";
	print_r($_FILES);
echo "</pre>";
    
	if(isset($_FILES) && !empty($_FILES['fichier']))
	{
		foreach ($_FILES['fichier'] as $key => $value) {
			$aff.= "<p>clé : $key - valeur : $value </p>";
		}
		
		
	}
	
	if($_FILES['fichier']['error']==0)
	{
			
		//copie sur le disque dur 
		move_uploaded_file($_FILES["fichier"]["tmp_name"],"upload/".$_FILES["fichier"]["name"]);
      $aff.= "Stored in: " . "upload/" . $_FILES["fichier"]["name"];

	}
}


?>





<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Formulaire</title>

<style type="text/css">
#info p {
          display : inline;}

</style>


</head>

<body>
<form id="formulaire" enctype="multipart/form-data" method="post" action="envoieFichier.php">
    <fieldset id="credentials">
        <legend>Transfert de fichier</legend>
         <p><label for="fichier" id="idNom">Fichier</label>
          <input type="file" id="fichier" name="fichier" accept="image/jpeg" />
         </p> 
   
    <p class="submit">
    	<label>Clic</label>
      <input type="submit" id="btnSubmit" name="actionEnvoie" value="envoie" accesskey="C" title="Alt+C" />
       
    </p>
  </fieldset>
</form> 



<p><?=$aff;?></p>



</body>
</html>
