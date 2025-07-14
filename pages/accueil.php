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
                    <td><?= htmlspecialchars($obj["nom_objet"]); ?></td>
                    <?php $verifie = emprunt_current($obj["id_objet"]); ?>
                    <td class="<?= $verifie ? 'text-danger' : 'text-success' ?>">
                        <?= $verifie ? 'Occupé jusqu’au '.$verifie["date_retour"] : 'Disponible'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
