<?php

function moyenne($srilanka){
    $moyPop=0;
    foreach($srilanka as $key => $caracteristiques){
        foreach($caracteristiques as $key => $value){
            if($key=='pop')
                $moyPop += $value;
        }
    }
    return $moyPop/sizeof($srilanka);
}

function calculMensualite($capital, $tauxAnnuel, $duree, $tauxAssuAnnuel)
{
    $tauxMensuel = $tauxAnnuel/12;
    $nbDeMois = $duree*12;
    $tauxAssuranceMensuel = $tauxAssuAnnuel/12;
    $coutAssurance = $capital*$tauxAssuranceMensuel;
    $res = ($capital*$tauxMensuel)/(1-pow(1+$tauxMensuel, -$nbDeMois)) + $coutAssurance;

    return round($res);
}

function parcoursDossier($chemin)
{
    foreach ($chemin as $dossier) {
        if ($encours = opendir($dossier)) {
            while (false !== ($fichier = readdir($encours))) {
                if ($fichier !== '.' && $fichier !== '..') {
                    $res[] = $fichier;
                }
            }
        }
    }
    return $res;
}

?>