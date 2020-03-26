<?php

$pdo = get_pdo();
$req = $pdo->query("SELECT * FROM equipements ");
$equipements = $req->fetchall();
?>