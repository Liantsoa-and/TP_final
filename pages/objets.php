<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("header.php");
$id_categorie = $_GET["id_categorie"];
$categorie = avoir_categorie($id_categorie);
$objets = avoir_objets_categorie($id_categorie);  
?>
<main class="container my-5">
    <h2 class="text-center text-primary mb-4">Objets de la catégorie : <?= htmlspecialchars($categorie["nom_categorie"]) ?></h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle bg-white shadow-sm">
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
                        <?= $verifie ? 'Occupé jusqu’au ' . $verifie["date_retour"] : 'Disponible'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        <a href="categories.php" class="btn btn-secondary">← Retour aux catégories</a>
    </div>
</main>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
