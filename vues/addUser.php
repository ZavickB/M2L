<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM ligues where id_ligue != 1 ");
$ligues = $req->fetchall(); ?>
<div class="jumbotron">
<form action="index.php?action=ajoutUser" method="post">
Votre nom <input type="text" name='nom_user' /> <br/>
Votre prénom <input type="text" name='pnom_user' /> <br/>
Votre e-mail <input type="email" name='mail'/> <br/>
Votre login <input type="text" name="login"/> <br/>
Votre mot de passe <input type="text" name='mdp' /> <br/>
Votre numero de téléphone (+33) <input type="tel" name="tel"
                                       minleght='9' maxlength="9"required> <br/>
   <div class="form-group">
      <label for="exampleSelect1">Votre ligue </label>
      <select name="id_ligue" class="form-control"> 
          <?php foreach($tabligues as $uneligue){
             echo '<option value="'.$uneligue['id_ligue'].'">'.$uneligue['nom_ligue'].'</option>';}
          ?>
      </select>
   </div>
<input type="submit" class="btn btn-primary" value='Envoyer'/>
</form>
</div>
 
    </body>
</html>
