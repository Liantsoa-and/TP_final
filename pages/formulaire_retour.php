<?php
include("header.php");
$id_membre = $_GET['id_membre'];
//echo $id_membre;
$id_objet = $_GET['id_objet'];
//echo $id_objet;
?>

<form action="traitement_retour.php" method="post">
    <label for="retour">Etat de l'objet</label>
    <select name="retour" id="">
        <option value="0">Bon Etat</option>
        <option value="1">Mauvaise Etat</option>
    </select>
    <br>
    <input type="hidden" name="id_membre" value="<?= $id_membre ?>">
    <input type="hidden" name="id_objet" value="<?= $id_objet ?>">
    <input type="submit" value="Valider">
</form>
    
</body>
</html>