<?php
include("header.php");
$categories = avoir_categories();
?> 
<main>
    <div class="error">
        <?php if(isset($_SESSION['mes'])){
            echo $_SESSION['mes'];
            unset($_SESSION['mes']);
        } ?>
    </div>
    <p><h1 class="text-center">Ajouter un nouvel objet:</h1></p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <p>Nom de l'objet: <input type="text" name="nom" id="" required></p>
        <p>Categorie : 
            <select name="categorie" id="" required>
                <?php foreach($categories as $categorie) {?>
                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                <?php } ?>
            </select>
        </p>
        <input type="hidden" name="idmembre" value="<?= $_SESSION['user']['id_membre'] ?>">
        <div class="mb-3"> 
            <label for="fichier" class="form-label">Choisir une ou plusieurs image(s) :</label> 
            <input type="file" class="form-control" name="fichier" id="fichier" > 
        </div>
        <p><input type="submit" value="Ajouter"></p>

    </form>
</main>
</body>
</html>