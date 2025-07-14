<?php
include("header.php");
$id_membre = $_GET['id_membre'];
$membre = avoir_membre_id($id_membre);
$ses_objets = avoir_objets_membre($id_membre);
?>
<main>
    <div class="row">
        <p>Nom: <?= $membre['nom']; ?></p>
        <p>Date de naissance : <?= $membre['datenaissance']; ?></p>
        <p>Email : <?= $membre['email']; ?></p>
        <p>Genre : <?= $membre['genre']; ?></p>
        <p>Ville : <?= $membre['ville'] ?></p>
        <br>
        <p><h3>Ses objets:</h3></p>
        <table border="1">
            <tr>
                <th>Nom objet</th>
                <th>Categorie</th>
            </tr>
            <?php foreach($ses_objets as $obj){
                $categorie = avoir_categorie($obj['id_categorie']); ?>
                <tr>
                    <td><?= $obj['nom_objet']; ?></td>
                    <td><?= $categorie['nom_categorie']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>
</body>
</html>