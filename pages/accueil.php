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
<!--  -->
<?php
$id_membre = $_GET['id_membre'];
$membre = avoir_membre_id($_SESSION['user']['id_membre']);
$ses_objets = liste_emprunt_current_membre($_SESSION['user']["id_membre"]);
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
        <table class="table table-bordered table-hover text-center align-middle bg-white shadow-sm" >
            <tr>
                <th>Nom objet</th>
                <th>Categorie</th>
                <th>Retour</th>
            </tr>
            <?php foreach($ses_objets as $obj){
                $categorie = avoir_categorie($obj['id_categorie']); ?>
                <tr>
                    <td><?= $obj['nom_objet']; ?></td>
                    <td><?= $categorie['nom_categorie']; ?></td>
                    <td><a href="formulaire_retour.php?id_membre=<?= $_SESSION['user']["id_membre"] ?>&id_objet=<?= $obj["id_objet"]; ?>"><button>Retourner</button></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>
</body>
</html>
