<?php
include("header.php");
$id_objet = $_GET['id_objet'];
$objet = avoir_objet_id($id_objet);
$historique = avoir_historique_emprunts($id_objet);
?>
<main>
<div class="container my-5">        
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4 border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="property-detail-title mb-1"><?= $objet['nom_objet']; ?></h2>
                        <p class="text-muted property-detail-location"><i class="bi bi-geo-alt-fill"></i><?= $objet['nom_categorie'];?></p>
                    </div>
                    <?php $verifie = emprunt_current($objet["id_objet"]); ?>
                    <span class="badge <?= $verifie ? 'text-danger' : 'text-success' ?>" fs-6"><?= $verifie ? 'Occupé jusqu’au '.$verifie["date_retour"] : 'Disponible'; ?></span>
                </div>

                <div class="d-flex justify-content-start align-items-center mb-4">
                    <h3 class="property-price-lg me-3">Ville</h3>
                </div>

                <div class="gallery-section mb-4">
                    <h4 class="section-title">Gallery</h4>
                    <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Tokony misy boucle selon image -->
                            <div class="carousel-item active">
                                <img src="./../assets/images/17.jpg" class="d-block w-100 main-gallery-img" alt="Image 1">
                            </div>
                        </div>

                        <!-- Contrôles -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- boucle des mianiatures -->
                    <div class="d-flex mt-3 justify-content-start flex-wrap gallery-thumbnails">
                        <img src="./../assets/images/17.jpg" class="img-thumbnail me-2 mb-2 active-thumbnail" alt="Thumbnail 1" data-bs-target="#propertyCarousel" data-bs-slide-to="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <p><h2>Historique des emprunts</h2></p>
    <table>
        <tr>
            <th>Date de debut</th>
            <th>Date de retour</th>
        </tr>
    <?php foreach($historique as $h){?>
        <tr>
            <td><?= $h['date_emprunt']; ?></td>
            <td><?= $h['date_retour']; ?></td>
        </tr>
    <?php } ?>
    </table>
</div>
</main>

</body>
</html>