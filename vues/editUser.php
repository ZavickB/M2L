
<div class="jumbotron">
<!-- <?php dd($tabLigues);?> -->
<h1><?= $user['nom_user']." ".$user['pnom_user'];?></h1>
    <form action =""  method="post">
        <div div class="form-group">Nom<input type="text" name="nom_user" value="<?= h($user['nom_user']);?>" /> <br/> </div>
        <div div class="form-group">Prénom<input type="text" name="pnom_user" value="<?= h($user['pnom_user']);?>" /> <br/> </div>
        <div class="form-group">Mail <input type="text" name="mail" value="<?= h($user['mail']);?>"/> </br> </div>
        <div class="form-group">
          <label for="exampleSelect1">Choisissez votre ligue dans la liste </label>
          <select name="id_ligue" class="form-control"> 
              <?php foreach($tabLigues as $ligue){
                 if($ligue['bloquee']==0){
                     if($ligue['id_ligue']==$user['id_ligue']){
                         $selected = "selected";
                     }else{
                         $selected = "";
                     }
                    echo '<option value="'.$ligue['id_ligue'].'"'.$selected.'>'.$ligue['nom_ligue'].'</option>'; 
                 }
              }
              ?>
          </select>
        </div>
        <input type="submit" class="btn btn-primary" value='Envoyer'/>
    </form>
</div>
 
