
<div class="jumbotron justify-content-center">
    <form class="form" action="index.php?action=auth" method="post">
        <div class="form-group col-md-4"> Login : <input type="text" name="login" class="form-control"/><br/></div>
        <div class="form-group col-md-4"> Mot de passe : <input type="password" name="mdp" class="form-control"/> <br/></div>
        <input type="submit" class="btn btn-primary " value="Se connecter"/> <hr/>
        <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"   >Nouvel Utilisateur ? Créez un compte !! </a>
    </form>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="jumbotron">
            <form action="index.php?action=ajoutUser" method="post">
                <h1> Créer un nouvel utilisateur</h1>
                <div class="form-group" >Nom <input type="text" name='nom_user' class="form-control"/> </div>
                <div class="form-group" >Prénom <input type="text" name='pnom_user' class="form-control"/> </div>
                <div class="form-group" >E-mail <input type="email" name='mail' class="form-control"/> </div>
                <div class="form-group" >Login <input type="text" name="login" class="form-control"/> </div>
                <div class="form-group" >Mot de passe <input type="password" name='mdp' class="form-control"/> </div>
                <div class="form-group" >Numero de téléphone (+33) <input type="tel" name="tel"
                                                       minleght='9' maxlength="10" required class="form-control"> </div>
                <div class="form-group">
                   <label for="exampleSelect1">Choisissez la ligue dans la liste </label>
                   <select name="id_ligue" class="form-control"> 
                       <?php foreach($ligues as $uneLigue){
                          if($uneLigue['bloquee']==0){
                             echo '<option value="'.$uneLigue['id_ligue'].'">'.$uneLigue['nom_ligue'].'</option>'; 
                          }
                       }
                       ?>
                   </select>
                </div>
                <input type="submit" class="btn btn-primary" value='Envoyer'/>
            </form>
        </div>
    </div>
  </div>
</div>