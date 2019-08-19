<?php
include("header.php");
?>


<form action="index.php?action=auth" method="post">
 Login : <input type="text" name="login" /><br />
 Mot de passe : <input type="password" name="mdp" /><br />
 <input type="submit" value="Authentification" />
 <a href="index.php?action=addUser">Nouvel Utilisateur ? </br> Créez un compte !! </a>
</form>

<?php 
include("footer.php");
 ?>
