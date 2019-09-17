 <?php 
 require 'modeles/users.php';
 require 'modeles/ligues.php';
 
 $tabligues=getLigues();
 
    genererPage($action);
