<?php
include("header.php");
?>
<?php
include("header.php");
$objets_bon = avoir_objets_retournes_par_etat(0);
$objets_mauvais = avoir_objets_retournes_par_etat(1);
?>

<h2>Objets retournés en bon état</h2>
<ul>
<?php foreach($objets_bon as $obj): ?>
    <li><?= htmlspecialchars($obj['nom_objet']) ?> (retourné le <?= $obj['date_retour'] ?>)</li>
<?php endforeach; ?>
</ul>

<h2>Objets retournés en mauvais état</h2>
<ul>
<?php foreach($objets_mauvais as $obj): ?>
    <li><?= htmlspecialchars($obj['nom_objet']) ?> (retourné le <?= $obj['date_retour'] ?>)</li>
<?php endforeach; ?>
</ul>