<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM salles");
$salles = $req->fetchall(); 
dd($salles);

/********************************************************
***     FONCTIONS    ************************************
********************************************************/


/**
 * retourne vrai si la classe passée en parametre est occupée en ce moment
 *
 * @param array $salles
 * @return boolean
 */

function reservee(array $salles): bool{
    $pdo = get_pdo();
    $req = $pdo->prepare("SELECT * FROM reservation WHERE NOW() BETWEEN hr_debut AND hr_fin ");
    $req->execute([$salles['id']]);
    $reservation = $req->fetch();
    if($reservation){
        return true;
    } else{
        return false;
    }
}

/**
 * retourne vrai si la classe passée en parametre renseignée comme verrouillée dans la BDD
 *
 * @param array $salles
 * @return boolean
 */
function bloquee_salle(array $salles): bool{
    $pdo = get_pdo();
    $req = $pdo->prepare("SELECT * FROM salles WHERE bloquee IS NOT NULL AND id=?");
    $req->execute([$salles['id']]);
    $est_bloquee = $req->fetch();
    if($est_bloquee){
        return true;
    } else{
        return false;
    }
}

/**
 * Retourne vrai si la salle est informatisée
 *
 * @param array $salles
 * @return boolean
 */
function informatisee_salle(array $salles): bool{ 
    if($salles['informatisee']){
        return true;
    } else{
        return false;
    }
}
