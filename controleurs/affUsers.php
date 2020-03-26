<?php
 require 'modeles/ligues.php';
 
 $tabligues=getLigues();
 
$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM users");
$users = $req->fetchall();

pages('affUsers', ['title' => "M2L - Affichage des utilisateurs" , 'users' => $users, 'admin' => $admin, 'ligues' =>$ligues]);
