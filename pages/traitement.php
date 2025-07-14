<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

 include("../inc/fonctions.php");

 if(isset($_POST["email"]) && isset($_POST["mdp"])){
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $user = login($email, $mdp);
    if($user){
        session_start();
        $_SESSION["user"] = $user;
        header("location:accueil.php");
        exit();
    }
 }

 if(isset($_POST["nom"]) && isset($_POST["ville"]) && isset($_POST["genre"])){
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $ville = $_POST["ville"];
    $genre = $_POST["genre"];
    $datenaissance = $_POST["datenaissance"];
    $mdp = $_POST["mdp"];
    $result = newuser($nom, $email, $datenaissance, $genre, $ville, $mdp);
    if($result){
        session_start();
        $_SESSION["user"] = $result;
        header("location:accueil.php");
        exit();
    }
 }
?>