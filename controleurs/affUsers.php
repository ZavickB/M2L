<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM users");
$users = $req->fetchall();

pages('affUsers', ['title' => "M2L - Affichage des utilisateurs" , 'users' => $users, 'admin' => $admin]);
