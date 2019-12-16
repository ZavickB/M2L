 <?php 
 require 'modeles/ligues.php';
 
 $tabligues=getLigues();
 
 pages('addUser', ['title' => "M2L - Ajout d'un nouvel utilisateur", 'ligues' => $ligues ]);
