<?php 
 include("header.php");
 $membres = avoir_membres();
?>
<main>
    <div class="container my-5">
        <h2 class="mb-4 text-center text-primary">Liste des membres</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center shadow-sm bg-white">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Email</th>
                        <th>Genre</th>
                        <th>Ville</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($membres as $membre): ?>
                    <tr>
                        <td><?= $membre["id_membre"]; ?></td>
                        <td><a href="membre.php?id_membre=<?= $membre["id_membre"]; ?>"><?= htmlspecialchars($membre["nom"]); ?></a></td>
                        <td><?= $membre["datenaissance"]; ?></td>
                        <td><?= $membre["email"]; ?></td>
                        <td><?= $membre["genre"]; ?></td>
                        <td><?= $membre["ville"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>