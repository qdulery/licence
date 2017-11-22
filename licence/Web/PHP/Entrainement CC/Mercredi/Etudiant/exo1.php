<?php
		$tab=array("cours 1"=>array("matière"=>"anglais","coef"=>2,"note"=>12),
					"cours 2"=>array("matière"=>"java","coef"=>4,"note"=>11),
					"cours 3"=>array("matière"=>"web","coef"=>4,"note"=>13));
		
		$moy=0;
		$diviseur=0
	
		
	
	
	?>


<!doctype html>
	
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>

		<!--affichage-->
		<?php foreach($tab as $id=>$value): ?>
			<?= $id ?> : <?= $value['matière'] ?> coef (<?= $value['coef'] ?>) note (<?= $value['note'] ?>)<br>
			<?php $moy+=$value['note'] * $value['coef'] ?>
			<?php $diviseur+=$value['coef'] ?>
		<?php endforeach; ?>
			Moyenne : <?= $moy=$moy/$diviseur ?>
		
			
		<!--moyenne-->
		

	
</body>
</html>
