<?php
if(isset($_GET['nom']) && isset($_GET['prenom'])){
	echo "Bonjour ".$_GET['nom']." ".$_GET['prenom'];
}else{
	echo "Bonjour";
}