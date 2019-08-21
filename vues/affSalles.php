<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM salles");
$salles = $req->fetchall(); 
// dd($salles);
?>
<div class="jumbotron">
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
                <td><?php if(informatisee($salles)) {
                       echo '<i class="fas fa-satellite-dish" 
                            <span style="font-weight: solid;">
                            <span style="color: Mediumslateblue;">
                            </span></i>'
                           ;}
                    ?>
                </td>
            </tr>
         <?php endforeach; ?>
</tbody>
</div>
<?php
    include("footer.php");
 ?>
