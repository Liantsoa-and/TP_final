<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("../inc/fonctions.php");
session_start();


$id_membre = $_POST['id_membre'];
$id_objet = $_POST['id_objet'];
$today = date('Y-m-d');
$etat = $_POST['retour'];

$res = retourner_objet($id_membre, $id_objet, $today);
if ($res) {
    header("Location: accueil.php?message=Retour de l'objet effectué avec succès");
    exit();
} else {
    echo "Erreur lors du retour de l'objet.";
}
