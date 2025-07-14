<?php
include("connexion.php");

function newuser ($nom, $email, $datenaissance, $mdp){
    $connexion = connexion();

    if(email($connexion, $email)){
        fermer_connexion($connexion);
        return false;
    }

    $sql = "INSERT INTO membres (nom, email, datenaissance, mdp) 
            VALUES ('%s','%s','%s', '%s')";
    $sql = sprintf($sql, $nom,$email,$datenaissance,$mdp);
    $result = mysqli_query($connexion, $sql);

    if($result){
        $idmembre = mysqli_insert_id($connexion);
    } else {
        $idmembre = false;
    }

    fermer_connexion($connexion);

    return $idmembre;
}


?>