<?php

$pdo = get_pdo();
$req = $pdo->query("SELECT * FROM ligues where id_ligue !='1'");
$ligues = $req->fetchall();
/********************************************************
***     FONCTIONS    ************************************
********************************************************/

function getLigues(){
    return select('SELECT id_ligue, nom_ligue FROM ligues');
}

function userLigue($login,$mdp){
    $tab= select("SELECT * FROM ligues WHERE id_ligue = ( SELECT id_ligue FROM users where login='$login' and mdp='$mdp'",1);
    return $tab['nom_ligue'] ." (". $tab['abreviation'] .")";
}   
