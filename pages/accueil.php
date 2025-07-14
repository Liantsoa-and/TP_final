<?php
    include("../inc/fonctions.php");
    session_start();

    $objets = avoir_objets();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nom</th>
        </tr>
    <?php foreach($objets as $obj){?>
        <tr>
        <td><?php echo $obj["id_objet"]; ?></td>
        <td><?php echo $obj["nom_objet"]; ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>