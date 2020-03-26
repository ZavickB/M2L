<?php
 require 'modeles/ligues.php';
 $tabligues=getLigues();
pages('logging',['title' => 'M2L - Connexion', 'ligues' =>$ligues]);