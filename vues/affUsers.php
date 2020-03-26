<div class="jumbotron">
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1>Utilisateurs</h1>
    <?php if($admin=='TRUE'){
        echo '<a class="btn btn-primary" data-toggle="modal" data-target="#myModal"> + </a>';}?>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="jumbotron">
            <form action="index.php?action=ajoutUser" method="post">
                <h1>Ajouter un nouvel utilisateur</h1>
                <div class="form-group" >Nom <input type="text" name='nom_user' class="form-control"/> <br/> </div>
                <div class="form-group" >Prénom <input type="text" name='pnom_user' class="form-control"/> <br/> </div>
                <div class="form-group" >E-mail <input type="email" name='mail' class="form-control"/> <br/> </div>
                <div class="form-group" >Login <input type="text" name="login" class="form-control"/> <br/> </div>
                <div class="form-group" >Mot de passe <input type="password" name='mdp' class="form-control"/> <br/> </div>
                <div class="form-group" >Numero de téléphone (+33) <input type="tel" name="tel"
                                                       minleght='9' maxlength="10" required class="form-control"> <br/> </div>
                <div class="form-group">
                   <label for="exampleSelect1">Choisissez la ligue dans la liste </label>
                   <select name="id_ligue" class="form-control"> 
                       <?php foreach($ligues as $uneLigue){
                          if($uneLigue['bloquee']==0){
                             echo '<option value="'.$uneLigue['id_ligue'].'">'.$uneLigue['nom_ligue'].'</option>'; 
                          }
                       }
                       ;?>
                   </select>
                </div>
                <input type="submit" class="btn btn-primary" value='Envoyer'/>
            </form>
        </div>
    </div>
  </div>
</div>
