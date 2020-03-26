<div class="jumbotron">
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Ligues</h1>

    <?php if($_SESSION['user']['role']=='1'){
            echo '<a class="btn btn-primary" data-toggle="modal" data-target="#myModal"> + </a>';}
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="jumbotron">
            <form action="index.php?action=ajoutLigue" method="post">
                <h1> Créer une nouvelle ligue</h1>
                    <div class="form-group" >Nom de la ligue <small class="text-muted-succes"> sans accent(s) ni caractères spéciaux.</small>
                        <input type="text" name='nom_ligue' class="form-control"/> </div>
                    <div class="form-group">Abréviation<input type="text" name='abreviation' class="form-control"/> </div>
                    <div class="form-group">Contact<input type="number" name='contact' class="form-control"/> </div>

                <input type="submit" class="btn btn-primary" value='Envoyer'/>
            </form>
        </div>
    </div>
  </div>
</div>