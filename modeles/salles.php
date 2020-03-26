<?php

/********************************************************
***     FONCTIONS    ************************************
********************************************************/

/*
 *Insere une nouvelle salle
 */
function ajoutSalle($tbData){
    $tbData['bloquee']='0';
    ecrire("salles",$tbData);
}

/**
 * retourne vrai si la classe passée en parametre est occupée en ce moment
 *
 * @param array $salles
 * @return boolean
 */

/*function reservee(array $salles): bool{
    $pdo = get_pdo();
    $req = $pdo->prepare("SELECT * FROM reservation WHERE NOW() BETWEEN hr_debut AND hr_fin ");
    $req->execute([$salles['id']]);
    $reservation = $req->fetch();
    print_r($reservation);
    return $reservation;
/*    if($reservation){
        return true;
    } else{
        return false;
    }
}
*/

function bloquerSalle($idSalle) {
    requete("UPDATE salles SET bloquee='1' WHERE id_salle=".$idSalle);
}

function debloquerSalle($idSalle){
    requete("UPDATE salles SET bloquee='0' WHERE id_salle=".$idSalle);
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

/**
 * 
 * @param bool $checkbox
 * @return bool
 */
function coché_informatisée(bool $checkbox): bool{
    if ($checkbox == 1) {
        return true;
    } else {
        return false;
    }
}