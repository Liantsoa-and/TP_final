<?php
include("connexion.php");

function newuser($nom, $email, $datenaissance, $genre, $ville, $mdp)
{
    $connexion = connexion();

    $sql = "INSERT INTO tp_final_membre (nom, email, datenaissance,genre,ville,mdp) 
            VALUES ('%s','%s','%s', '%s','%s','%s')";
    $sql = sprintf($sql, $nom, $email, $datenaissance, $genre, $ville, $mdp);
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $idmembre = mysqli_insert_id($connexion);
    } else {
        $idmembre = false;
    }

    fermer_connexion($connexion);

    return $idmembre;
}

function login($email, $mdp)
{
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

function avoir_objets()
{
    $connexion = connexion();

    $sql = "SELECT * FROM tp_final_objet";
    $result = mysqli_query($connexion, $sql);

    $objets = [];
    while ($objet = mysqli_fetch_assoc($result)) {
        $objets[] = $objet;
    }

    return $objets;
}

function emprunt_current($id_objet)
{
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

function avoir_categories()
{
    $connexion = connexion();

    $sql = "SELECT * FROM tp_final_categorie_objet";
    $result = mysqli_query($connexion, $sql);

    $categories = [];
    while ($categorie = mysqli_fetch_assoc($result)) {
        $categories[] = $categorie;
    }

    return $categories;
}

function avoir_objets_categorie($id_categorie)
{
    $connexion = connexion();
    $sql = "SELECT * FROM tp_final_objet WHERE id_categorie = '$id_categorie'";
    $result = mysqli_query($connexion, $sql);
    $objets = [];
    while ($objet = mysqli_fetch_assoc($result)) {
        $objets[] = $objet;
    }
    return $objets;
}

function avoir_categorie($id_categorie)
{
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
function avoir_objet_id($id_objet)
{
    $connexion = connexion();

    $sql = "SELECT * FROM v_objet_categorie WHERE id_objet = '$id_objet'";
    $result = mysqli_query($connexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $retour = mysqli_fetch_assoc($result);
    }
    fermer_connexion($connexion);

    return $retour;
}

function avoir_historique_emprunts($id_objet)
{
    $connexion = connexion();

    $sql = "SELECT * FROM v_tp_final_emprunt_current WHERE id_objet = '$id_objet' ORDER BY date_emprunt DESC";
    $result = mysqli_query($connexion, $sql);

    $historique = [];
    while ($emprunt = mysqli_fetch_assoc($result)) {
        $historique[] = $emprunt;
    }

    fermer_connexion($connexion);
    return $historique;
}

function ajouter_objet($nom, $id_categorie, $image, $idmembre)
{
    $connexion = connexion();

    $sql1 = "INSERT INTO tp_final_objet (nom_objet,id_categorie,id_membre) 
    VALUES ('$nom','$id_categorie','$idmembre')";
    $result1 = mysqli_query($connexion, $sql1);

    if ($result1) {
        $id_objet = mysqli_insert_id($connexion);
        $sql2 = "INSERT INTO tp_final_images_objet (id_objet,nom_image) VALUES ('$id_objet','$image')";
        $result2 = mysqli_query($connexion, $sql2);
        if ($result2) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function avoir_membre_id($idmembre)
{
    $connexion = connexion();
    $retour = null;

    $sql = "SELECT * FROM  tp_final_membre WHERE id_membre = '$idmembre'";
    $result = mysqli_query($connexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $retour = mysqli_fetch_assoc($result);
    }
    fermer_connexion($connexion);

    return $retour;
}
function avoir_objets_membre($idmembre)
{
    $connexion = connexion();

    $sql = "SELECT * FROM tp_final_objet WHERE id_membre='$idmembre'";
    $result = mysqli_query($connexion, $sql);
    $retour = [];

    while ($donnes = mysqli_fetch_assoc($result)) {
        $retour[] = $donnes;
    }
    return $retour;
}

function avoir_membres()
{
    $connexion = connexion();

    $sql = "SELECT * FROM tp_final_membre";
    $result = mysqli_query($connexion, $sql);
    $retour = [];

    while ($donnes = mysqli_fetch_assoc($result)) {
        $retour[] = $donnes;
    }
    return $retour;
}

function emprunter_objet($idmembre, $id_objet, $date_retour)
{
    $connexion = connexion();

    $sql = "INSERT INTO tp_final_emprunt (id_objet,id_membre,date_emprunt,date_retour) 
    VALUES ('$id_objet','$idmembre',NOW(),'$date_retour')";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $id_emprunt = mysqli_insert_id($connexion);
    } else {
        $id_emprunt = false;
    }
}

function liste_emprunt_current_membre($id_membre)
{
    $connexion = connexion();

    $sql = "SELECT * FROM v_tp_final_emprunt_current WHERE id_membre = '$id_membre'";
    $result = mysqli_query($connexion, $sql);
    $retour = [];

    while ($donnes = mysqli_fetch_assoc($result)) {
        $retour[] = $donnes;
    }
    return $retour;
}


function retourner_objet($idmembre, $id_objet, $date_retour)
{
    $connexion = connexion();
    $sql = "SELECT id_emprunt FROM tp_final_emprunt WHERE id_objet = '$id_objet' AND id_membre = '$idmembre' AND date_retour >= CURDATE() ORDER BY date_emprunt DESC LIMIT 1";
    $result = mysqli_query($connexion, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_emprunt = $row['id_emprunt'];
        $sql_update = "UPDATE tp_final_emprunt SET date_retour = '$date_retour' WHERE id_emprunt = '$id_emprunt'";
        $update_result = mysqli_query($connexion, $sql_update);
        fermer_connexion($connexion);
        return $update_result;
    } else {
        fermer_connexion($connexion);
        return false;
    }
}

function avoir_objets_retournes_par_etat($etat) {
    $connexion = connexion();
    $sql = "SELECT o.*, e.date_retour, e.etat_retour 
            FROM tp_final_objet o
            JOIN tp_final_emprunt e ON o.id_objet = e.id_objet
            WHERE e.date_retour IS NOT NULL AND e.etat_retour = '$etat'";
    $result = mysqli_query($connexion, $sql);
    $objets = [];
    while($row = mysqli_fetch_assoc($result)){
        $objets[] = $row;
    }
    fermer_connexion($connexion);
    return $objets;
}
