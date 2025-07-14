<?php
    include("header.php");
    $objets = avoir_objets();
?>
    <main>

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