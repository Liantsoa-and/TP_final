<?php
include("header.php");
$categories = avoir_categories();
?>

<div class="row">
    <form action="traitement.php" method="post">
        <select name="categorie" id="">
            <option value="">-- Tous --</option>
            <?php foreach($categories as $cat){?>
                <option value="<?= $cat['id_categorie']; ?>"><?= $cat['nom_categorie']; ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="texte" name="nom_objet" id="" placeholder="Nom de l'objet">
        <br>
        <input type="text">
    </form>
</div>
    
</body>
</html>