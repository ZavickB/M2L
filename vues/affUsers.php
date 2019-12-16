<div class="jumbotron">
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Utilisateurs</h1>
    <?php if($admin=='TRUE'){
        echo '<a href="index.php?action=addUSer" class="btn btn-primary"> + </a>';}?>
</div>
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Ligue </th>
            <th scope="col">Mail</th>
            <th scope="col">Login</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user):?>
                <tr class="<?php if($user['bloque']=='1'){echo 'table-primary';}?> ">
                <th scope="row"> <?= $user['nom_user'] ;?></th>
                <td><?= $user['pnom_user'];?></td>
                <td><?= getUserLigue($user['id_user']);?></td>
                <td><?= $user['mail'];?></td>
                <td><?= $user['login'];?></td>
                <td><?php if ($user['bloque']=='1'){echo '<span class="badge badge-danger">Bloqué</span>';};?></td>
        <?php if($admin=='TRUE'){
                echo '<td><a href="index.php?action=editUser&idUser='.$user['id_user'].'"><img src="Public/images/edit.png"/></a></td>';      /* ici !!---> */ 
                if($user['bloque']=='1'){
                    echo'<td><a href="index.php?action=debloquerUser&idUser='.$user['id_user'].'"><img src="Public/images/locked.png"/></a></td> ';
                }  
                else{ 
                    echo'<td><a href="index.php?action=bloquerUser&idUser='.$user['id_user'].'"><img src="Public/images/unlocked.png"/></a></td>';}
              ;}
              else{ echo '';}?>
             </tr>
         <?php endforeach; ?>

    </tbody>
</div>