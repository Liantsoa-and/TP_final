<?php 
include("../inc/fonctions.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage d'Objets</title>

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="accueil.php">Objets Partagés</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>

            <?php if (isset($_SESSION["user"])): ?>
            <span class="navbar-text me-3">
                Bonjour, <strong><?= htmlspecialchars($_SESSION["user"]["nom"]) ?></strong>
            </span>
            <?php endif; ?>
        </div>
    </div>
</nav>
