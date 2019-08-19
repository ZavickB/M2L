<?php include("header.php");?>
<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM ligues where id_ligue != 1 ");
$ligues = $req->fetchall(); ?>

<form action="index.php?action=ajoutUser" method="post">
Votre nom <input type="text" name='nom_user' />
Votre prénom <input type="text" name='pnom_user' />
Votre e-mail <input type="email" name='mail'/>
Votre login <input type="text" name="login"/>
Votre mot de passe <input type="text" name='mdp' />
Votre numero de téléphone (+33) <input type="tel" name="tel"
                                       minleght='9' maxlength="9"required>
Votre ligue <select name="id_ligue"> <?php foreach($tabligues as $uneligue){
    echo '<option value="'.$uneligue['id_ligue'].'">'.$uneligue['nom_ligue'].'</option>';}
                      ?>
            </select>
<input type="submit" value='Envoyer'/>
</form>

 
        <?php
            include("footer.php");
        ?> 
    </body>
</html>
