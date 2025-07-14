<?php 
 include("header.php");
    $id_membre = $_GET['id_membre'];
    $id_objet = $_GET['id_objet'];
    $membre = avoir_membre_id($id_membre);
    $objet = avoir_objet_id($id_objet);

?>
<main>
    <div class="row text-center">
        <p><h4>Emprunt d'objet <strong><?= $objet['nom_objet'] ?></strong> par le membre <strong><?= $membre['nom']; ?></strong></h4></p>
        <form action="traitement_emprunt.php" method="post">
            <input type="hidden" name="id_membre" value="<?= $id_membre ?>">
            <input type="hidden" name="id_objet" value="<?= $id_objet ?>">
            <p>Choisir la duree de jour de l'emprunt : <input type="number" name="duree" id="" min="1"> </p>
            <p><input type="submit" value="Valider"></p>
        </form>

    </div>
</main>