<?php

$pdo = get_pdo();
$req = $pdo->query("SELECT * FROM ligues");
$ligues = $req->fetchall();

pages('affLigues',['title' => 'M2L - Liste des ligues', 'ligues' => $ligues, 'admin' => $admin]);