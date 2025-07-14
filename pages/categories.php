<?php
include("header.php");
$categories = avoir_categories(); 
?>
<main class="container my-5">
    <h2 class="text-center text-primary mb-4">Liste des catégories</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle bg-white shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom de la catégorie</th>
                    <th>Voir les objets</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $categorie): ?>
                <tr>
                    <td><?= $categorie['id_categorie']; ?></td>
                    <td><?= htmlspecialchars($categorie['nom_categorie']); ?></td>
                    <td>
                        <a href="objets.php?id_categorie=<?= $categorie['id_categorie']; ?>" class="btn btn-outline-primary btn-sm">
                            Voir ses objets
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
