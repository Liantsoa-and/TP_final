<?php
include("header.php");
$objets = avoir_objets();
?>
<main class="container my-5">
    <h2 class="mb-4 text-center text-primary">Liste des objets</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center shadow-sm bg-white">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom de l'objet</th>
                    <th>Disponibilité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($objets as $obj): ?>
                <tr>
                    <td><?= $obj["id_objet"]; ?></td>
                    <td><a href="fiche.php?id_objet=<?= $obj["id_objet"]; ?>"><?= htmlspecialchars($obj["nom_objet"]); ?></a></td>
                    <?php $verifie = emprunt_current($obj["id_objet"]); ?>
                    <td class="<?= $verifie ? 'text-danger' : 'text-success' ?>">
                        <?php if($verifie != false){ 
                            echo 'Occupé jusqu’au '.$verifie["date_retour"]; 
                        } else {?>
                        <!-- <?= $verifie ? 'Occupé jusqu’au '.$verifie["date_retour"] : 'Disponible '; ?> -->
                         Disponible <a href="emprunt.php?id_membre=<?= $_SESSION['user']["id_membre"] ?>&id_objet=<?= $obj["id_objet"]; ?>"><button>Emprunter</button></a>
                         <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
