<?php
    include('../inc/fonctions.php');
    session_start();

    $nom = $_POST['nom'];
    $id_categorie = $_POST['categorie'];
    $id_membre = $_POST['idmembre'];

    $uploadDir = __DIR__ . '/image/';
    $maxSize = 15 * 1024 * 1024; // 15 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        // Vérifie si un fichier est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'])) {
        $file = $_FILES['fichier'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }
        // Vérifie la taille
        if ($file['size'] > $maxSize) {
            die('Le fichier est trop volumineux.');
        }
        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }
        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = "jpg";
        $photo = $originalName . '_' . uniqid();
        $newName = $photo . '.' . $extension;
    
        // Déplace le fichier
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            if(ajouter_objet($nom,$id_categorie,$newName,$id_membre)){
                $_SESSION['mes'] = "Ajout de l'objet ". $nom ." est reussi";
                header("Location:nouveau.php");

            } else {
                $_SESSION['mes'] = "Échec de l'ajout de l'objet.";
                header("Location:nouveau.php");
            }
        } else {
            $_SESSION['mes'] = "Échec du deplacement de l'image.";
            header("Location:nouveau.php");
        }
    } else {
        $newName = "./images/Default_image.jpg";
        if(ajouter_objet($nom,$id_categorie,$newName,$id_membre)){
            $_SESSION['mes'] = "Ajout de l'objet ". $nom ." est reussi";
            header("Location:nouveau.php");
        } else {
            $_SESSION['mes'] = "Échec de l'ajout de l'objet.";
            header("Location:nouveau.php");
        }
    }
?>