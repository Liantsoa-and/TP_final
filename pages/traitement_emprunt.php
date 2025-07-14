<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
 include("../inc/fonctions.php");
 session_start();

 $id_membre = $_POST['id_membre'];
 $duree = $_POST['duree'];
 $id_objet = $_POST['id_objet'];
 $date_retour = date('Y-m-d', strtotime("+$duree days"));

 if(emprunter_objet($id_membre,$id_objet,$date_retour)){
    header("Location: accueil.php?message=Emprunt réussi");
 }
 else {
    header("Location: accueil.php?message=Emprunt impossible");
 }

?>