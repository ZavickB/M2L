<?php
/********************************************************
*** FONCTIONS TECHNIQUES ********************************
********************************************************/
/**
 * initialisation de la connexion avec la BDD
 *
 * @return PDO
 */
function get_pdo(): PDO {
    return new PDO('mysql:host=localhost;dbname=ppe1', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}

/* =======================================
@arg : sql (requête sql)
@return : résultat requête ou ID si INSERT
=========================================*/
function requete($sql){
echo $sql;
	$cnx=mysqli_connect("localhost","root","","ppe1");
	$res=mysqli_query($cnx,$sql);
	$tab=explode(" ", $sql);
	$action=$tab[0];
	if($action=="INSERT" AND $res==TRUE) {
		return mysqli_insert_id($cnx);
	}
	else {
		return $res;
	}
}


function select($sql,$dim=2) {
	$res=requete($sql);
	$ligne=mysqli_fetch_array($res);
	if($dim==0){
		return $ligne[0];
	}
	elseif($dim==1) {
		return $ligne;
	}
	elseif($dim==2) {
		$tab[]=$ligne;
		while($ligne=mysqli_fetch_array($res)) {
			$tab[]=$ligne;
		}
		return $tab;
	}
}


function getPK($nomTable) {
	return select("SELECT COLUMN_NAME
				   FROM INFORMATION_SCHEMA.COLUMNS
	               WHERE TABLE_NAME = '".$nomTable."'
	               AND COLUMN_KEY='PRI'",0);
}


function ecrire($nomTable, $tbData, $id=0){
	if($id==0) { // INSERT
	    $sql="INSERT INTO ";
	}
	else { //UPDATE
		$sql="UPDATE ";
	}
$sql.=$nomTable;
	if(!empty($tbData)){
				$sql.=" SET "; // INSERT & UPDATE

				foreach($tbData AS $champ=>$val){ // INSERT & UPDATE
					$sql.=$champ."='".$val."', ";
				}

				$sql=substr($sql,0,-2);
}
	if($id!=0) { // UPDATE
		$nomId=getPK($nomTable);
		$sql.=" WHERE ".$nomId."=".$id;
	}
	return requete($sql);
}


function supprimer($nomTable, $id) {
	$nomId=getPK($nomTable);
	$sql="DELETE FROM ".$nomTable." WHERE ".$nomId."=".$id;
	return requete($sql);
}

/********************************************************
*** FONCTIONS METIER ************************************
********************************************************/

//=== UTILISATEURS ===========================================
function autorisation(){
/*	return !(!isset($_SESSION['auth'])
						and $_GET['action']!='affAlbum'
						and $_GET['action']!='auth'
						and $_GET['action']!='formUser'
						and $_GET['action']!='ajoutUser') ;*/
    return (isset($_SESSION['auth'])
						or $_GET['action']=='affSalles'
                                                or $_GET['action']=='auth'
    						or $_GET['action']=='addUser');
}

function auth($login,$mdp){
//	echo select("SELECT count(*) FROM users where login='".$login."' and mdp='".$mdp."'");
                                        return select("SELECT count(*) FROM users where login='".$login."' and mdp='".$mdp."'",0)==1;
}

function getUser($login,$mdp){
					$tab= select("SELECT nom_user, pnom_user FROM users where login='$login' and mdp='$mdp'",1);
					return $tab['nom_user']." ".$tab['pnom_user'];
}


function ajoutUser($tbData){
        $tbData['role']='0';
	ecrire("users",$tbData);
}


//=== LIGUES ===========================================
function getLigues(){
    return select('SELECT id_ligue, nom_ligue FROM ligues');
}

//=== SALLES ===========================================
/**
 * retourne vrai si la classe passée en parametre est occupée en ce moment
 *
 * @param array $salles
 * @return boolean
 */

function reservee(array $salles): bool{
    $pdo = get_pdo();
    $req = $pdo->prepare("SELECT * FROM reservation WHERE NOW() BETWEEN hr_debut AND hr_fin AND id_salle=?");
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
function bloquee(array $salles): bool{
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
function informatisee(array $salles): bool{ 
    if($salles['informatisee']){
        return true;
    } else{
        return false;
    }
}
;?>