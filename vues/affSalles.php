<div class="jumbotron">
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Salles de classe</h1>
    <?php if($_SESSION['user']['role']=='1'){
        echo '<a href="index.php?action=addSalle" class="btn btn-primary"> + </a>';}?>
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
         <?php foreach($salles as $salle):?>
             <tr class="<?php if(($salle['informatisee']=='1')&&($salle['bloquee']=='0')){echo 'table-info';}
                              elseif ($salle['bloquee']=='1'){echo 'table-primary';};?>">
                <th scope="row"> <?= $salle['nom_salle'] ;?></th>
                <td><?= $salle['id_salle'];?></td>
                <td><?= $salle['nb_places'];?></td>
                <td><?php if(informatisee_salle($salle)) {
                       echo '<i class="fas fa-satellite-dish" 
                            <span style="font-weight: solid;">
                            <span style="color: Mediumslateblue;">
                            </span></i>'
                           ;}
                    ?>
                </td>   
                <td><?php if ($salle['bloquee']=='1'){echo '<span class="badge badge-danger">Bloquée</span>';};?></td>
            <?php if($admin=='TRUE'){
                    echo '<td><a href="index.php?action=editSalle&idSalle='.$salle['id_salle'].'"><img src="Public/images/edit.png"/></a></td>';
                if($salle['bloquee']=='1'){
                    echo'<td><a href="index.php?action=debloquerSalle&idSalle='.$salle['id_salle'].'"><img src="Public/images/locked.png"/></a></td> ';
                }  
                else{ 
                    echo'<td><a href="index.php?action=bloquerSalle&idSalle='.$salle['id_salle'].'"><img src="Public/images/unlocked.png"/></a></td>';}
              ;}
              else{ echo '';}?>
            </tr>
         <?php endforeach; ?>
</tbody>
</div>
