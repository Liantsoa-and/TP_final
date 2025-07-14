<?php
 include("header.php");
 $categories = avoir_categories(); 
?>
<main>
    <p><h1>Liste des categories</h1></p>
    <table border="1">
        <tr>
            <th>Id_categorie</th>
            <th>Nom</th>
            <th>Ses Objets</th>
        </tr>
        <?php foreach($categories as $categorie){ ?>
            <tr>
                    <td><?php echo $categorie['id_categorie']; ?></td>
                    <td><?php echo $categorie['nom_categorie']; ?></td>
                    <td><a href="objets.php?id_categorie=<?php echo $categorie['id_categorie']; ?>">Voir ses objets</a></td>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>