<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM ligues where id_ligue!='1'");
$ligues = $req->fetchall(); 
?>
<div class="jumbotron">
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>ligues</h1>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Abréviation</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($ligues as $ligue):?>
             <tr class="">
             
                <th scope="row"><?= $ligue['nom_ligue'] ;?></th>
                <td><?= $ligue['abreviation'];?></td>
        <?php if($admin=='TRUE'){
                    echo '<td><a href=""><img src="Public/images/edit.png"/></a></td>';
                if($ligue['bloquee']=='1'){
                    echo'<td><img src="Public/images/locked.png"/></td>';
                }  
                else{ 
                    echo'<td><img id="lock"src="Public/images/unlocked.png"/></td>';}
              ;}
              else{ echo '';}?>
             </tr>
         <?php endforeach; ?>
</tbody>
</div>