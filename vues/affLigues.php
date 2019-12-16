<div class="jumbotron">
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Ligues</h1>

    <?php if($_SESSION['user']['role']=='1'){
            echo '<a href="index.php?action=addLigue" class="btn btn-primary"> + </a>';}
    ?> 
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Abréviation</th>
            <th scope="col">Contact (+33) </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ligues as $ligue):?>
             <tr class="<?php if($ligue['bloquee']=='1'){
                                    echo 'table-primary';
             }
                              elseif($ligue['id_ligue']==$_SESSION['user']['id_ligue']){
                                    echo 'table-success';
             };?>">
             
                 <th scope="row"><?= $ligue['nom_ligue'] ;?> </a> </th>
                     
                <td><?= $ligue['abreviation'];?></td>
                <td><?= $ligue['contact'];?></td>
                <td><?php if ($ligue['bloquee']=='1'){echo '<span class="badge badge-danger">Bloquée</span>';};?></td>
            <?php if($admin=='TRUE'){
                    echo '<td><a href="index.php?action=editLigue&idLigue='.$ligue['id_ligue'].'"><img src="Public/images/edit.png"/></a></td>';
                if($ligue['bloquee']=='1'){
                    echo'<td><a href="index.php?action=debloquerLigue&idLigue='.$ligue['id_ligue'].'"><img src="Public/images/locked.png"/></a></td> ';
                }  
                else{ 
                    echo'<td><a href="index.php?action=bloquerLigue&idLigue='.$ligue['id_ligue'].'"><img src="Public/images/unlocked.png"/></a></td>';}
              ;}
              else{ echo '';}?>
            </tr>
         <?php endforeach; ?>
</tbody>
</div>