<?php
function connexion(){
    $host = 'localhost';
    $user = 'ETU004199';
    $motdepasse = 'ZAldyDZd';
    $base = 'db_s2_ETU004199'; 
    /* teste */

/*     $host = 'localhost';
    $user = 'root';
    $motdepasse = '';
    $base = 'tp_final';*/
    $bdd = mysqli_connect($host, $user, $motdepasse, $base);
 
    if(!$bdd){
        echo "Erreur de connexion a la base";
    }

    return $bdd;
}

function fermer_connexion($bdd){
    mysqli_close($bdd);
}