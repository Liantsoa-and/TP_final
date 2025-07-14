<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

 include("header.php");
 $id_categorie = $_GET["id_categorie"];
 $categorie = avoir_categorie($id_categorie);
 $objets = avoir_objets_categorie($id_categorie);  
?>
<main>
    <p><h1>Liste des objets de categorie <?= $categorie["nom_categorie"] ?></h1></p>
    <table border="1">
        <tr>
            <th>Id_objet</th>
            <th>Nom</th>
            <th>Disponibilité</th>
        </tr>
    <?php foreach($objets as $obj){?>
        <tr>
        <td><?php echo $obj["id_objet"]; ?></td>
        <td><?php echo $obj["nom_objet"]; ?></td>
        <?php $verifie = emprunt_current($obj["id_objet"]); ?>
        <td>
            <?php if($verifie != false) 
                    {echo $verifie["date_retour"];}
                 else {echo "Disponible";} ?>
        </td>
        </tr>
    <?php } ?>
    </table>
</main>
</body>
</html>