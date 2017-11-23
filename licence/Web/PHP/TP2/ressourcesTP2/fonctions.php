<?php
function distance($tab){
    $dist=0;
    $R=6347;
    for($i=0; $i<sizeof($tab); $i++){
        $lat1=deg2rad($tab[$i][0]);
        $lat2=deg2rad($tab[$i++][0]);
        
        
        $long1=deg2rad($tab[$i][1]);
        $long2=deg2rad($tab[$i++][1]);
        
        $dist = 2;
    }
    
    return $dist;
}
?>