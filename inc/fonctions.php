<?php
include("connexion.php");

function newuser ($nom, $email, $datenaissance,$genre,$ville, $mdp){
    $connexion = connexion();

    $sql = "INSERT INTO membre (nom, email, datenaissance,genre,ville,mdp) 
            VALUES ('%s','%s','%s', '%s','%s','%s')";
    $sql = sprintf($sql, $nom,$email,$datenaissance,$genre,$ville,$mdp);
    $result = mysqli_query($connexion, $sql);

    if($result){
        $idmembre = mysqli_insert_id($connexion);
    } else {
        $idmembre = false;
    }

    fermer_connexion($connexion);

    return $idmembre;
}

function login($email,$mdp){
    $connexion = connexion();
    $retour = null;

    $sql = "SELECT * FROM membre WHERE email = '$email' AND mdp = '$mdp'";
    $requete = mysqli_query($connexion, $sql);
    $donne = mysqli_fetch_assoc($requete);

    
    if ($requete && mysqli_num_rows($requete) > 0) {
        $retour = $donne;
    }else {
        $retour = false;
    }
    fermer_connexion($connexion);

    return $retour;

}


?>