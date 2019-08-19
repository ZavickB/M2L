<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * from reservations where id_user ='".$id_user."'");
$reservations = $req->fetchall(); ?>

<?php
    include("header.php");
?>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Ma journée </h1>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Salle</th>
            <th scope="col">Heure de début</th>
            <th scope="col">Heure de fin</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($reservations as $reservation):?>
             <tr class="">
                <th scope="row"><?= $reservations['titre'] ;?></th>
                <td><?= $reservations['nom_salle'];?></td>
                <td><?= $reservations['hr_debut'];?></td>
                <td><?= $reservations['hr_fin'];?></td>
            </tr>
         <?php endforeach; ?>
</tbody>
                
                
<?php
    include("footer.php");

 ?>
