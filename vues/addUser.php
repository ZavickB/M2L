
<div class="jumbotron">
<form action="index.php?action=ajoutUser" method="post">
<div div class="form-group" >Votre nom <input type="text" name='nom_user' /> <br/> </div>
<div div class="form-group" >Votre prénom <input type="text" name='pnom_user' /> <br/> </div>
<div div class="form-group" >Votre e-mail <input type="email" name='mail'/> <br/> </div>
<div div class="form-group" >Votre login <input type="text" name="login"/> <br/> </div>
<div div class="form-group" >Votre mot de passe <input type="password" name='mdp' /> <br/> </div>
<div div class="form-group" >Votre numero de téléphone (+33) <input type="tel" name="tel"
                                       minleght='9' maxlength="10" required> <br/> </div>
   <div class="form-group">
      <label for="exampleSelect1">Choisissez votre ligue dans la liste </label>
      <select name="id_ligue" class="form-control"> 
          <?php foreach($ligues as $uneligue){
             if($uneLigue['bloquee']==0){
                echo '<option value="'.$uneligue['id_ligue'].'">'.$uneligue['nom_ligue'].'</option>'; 
             }
          }
          ?>
      </select>
   </div>
<input type="submit" class="btn btn-primary" value='Envoyer'/>
</form>
</div>
 
    </body>
</html>