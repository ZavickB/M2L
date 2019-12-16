<?php
include('./modeles/salles.php');

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM salles");
$salles = $req->fetchall();

pages('affSalles',['title' => 'M2L - Liste des salles' ,'salles' => $salles, 'admin' => $admin]);


