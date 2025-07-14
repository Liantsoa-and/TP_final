<?php
include("connexion.php");

function newuser ($nom, $email, $datenaissance,$genre,$ville, $mdp){
    $connexion = connexion();

    $sql = "INSERT INTO tp_final_membre (nom, email, datenaissance,genre,ville,mdp) 
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

function login($email, $mdp){
    $connexion = connexion();
    $retour = false;

    $sql = "SELECT * FROM tp_final_membre WHERE email = '$email' AND mdp = '$mdp'";
    $requete = mysqli_query($connexion, $sql);
    if ($requete && mysqli_num_rows($requete) > 0) {
        $retour = mysqli_fetch_assoc($requete);
    }
    fermer_connexion($connexion);

    return $retour;
}

function avoir_objets(){
    $connexion = connexion();

    $sql = "SELECT * FROM tp_final_objet";
    $result = mysqli_query($connexion, $sql);

    $objets = [];
    while($objet = mysqli_fetch_assoc($result)){
        $objets[] = $objet;
    }

    return $objets;
}

function emprunt_current($id_objet){
    $connexion = connexion();
    $retour = false;

    $sql = "SELECT * FROM v_tp_final_emprunt_current WHERE id_objet='$id_objet' 
            AND date_retour > NOW()";
    $result = mysqli_query($connexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $retour = mysqli_fetch_assoc($result);
    } 
    fermer_connexion($connexion);

    return $retour;
}

function avoir_categories(){
    $connexion = connexion();

    $sql = "SELECT * FROM tp_final_categorie_objet";
    $result = mysqli_query($connexion, $sql);

    $categories = [];
    while($categorie = mysqli_fetch_assoc($result)){
        $categories[] = $categorie;
    }

    return $categories;
}

function avoir_objets_categorie($id_categorie){
    $connexion = connexion();   
    $sql = "SELECT * FROM tp_final_objet WHERE id_categorie = '$id_categorie'";
    $result = mysqli_query($connexion, $sql);
    $objets = [];
    while($objet = mysqli_fetch_assoc($result)){
        $objets[] = $objet;
    }
    return $objets;
}

function avoir_categorie($id_categorie){
    $connexion = connexion();
    $retour = false;

    $sql = "SELECT * FROM tp_final_categorie_objet WHERE id_categorie = '$id_categorie'";
    $result = mysqli_query($connexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $retour = mysqli_fetch_assoc($result);
    }
    fermer_connexion($connexion);

    return $retour;
}

?>