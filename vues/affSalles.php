<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM salles");
$salles = $req->fetchall(); ?>

<?php
    include("header.php");
?>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Salles de classe</h1>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Numéro</th>
            <th scope="col">Nombre de places</th>
            <th scope="col">Informatisée</th>

        </tr>
    </thead>
    <tbody>
         <?php foreach($salles as $salles):?>
             <tr class="">
                <th scope="row"><?= $salles['nom_salle'] ;?></th>
                <td><?= $salles['id_salle'];?></td>
                <td><?= $salles['nb_places'];?></td>
                <td><?= informatisee($salles)? '<i class="fas fa-satellite-dish"></i>' : '';?></td>
            </tr>
         <?php endforeach; ?>
</tbody>
                
                
<?php
    include("footer.php");

 ?>
