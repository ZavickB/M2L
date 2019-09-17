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
    return new PDO('mysql:host=localhost;dbname=ppe1', 'root', 'root', [
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
	$cnx=mysqli_connect("localhost","root","root","ppe1");
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

function dd(...$vars){
    foreach($vars as $var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    }
}

function h(?string $value):string {
    if($value === null){
        return '';
    }
    return htmlentities($value);
}

function e404(){
    require("vues/404.php");
    exit();
}
/********************************************************
*** FONCTIONS METIER ************************************
********************************************************/
$action = $_GET['action'];
function genererPage($action){
    include('vues/header.php');
    include('vues/'.$action.'.php');
    include('vues/footer.php');
}

/**
 * inclue la page demandée
 *
 * @param string $vue
 * @param array $parameters
 * @return vue
 */
function render(string $vue, $parameters =[]){
    extract($parameters);
    require "vues/$vue.php";
}
/**
 * utilise la fonction render pour afficher la page entièrement (header puis body et ensuite footer)
 *
 * @param string $pageName
 * @param array $parameters
 * @return void
 */
function pages(string $pageName,array $parameters =[]){
    extract($parameters);
    render('header',$parameters);
    render($pageName,$parameters);
    render('footer');
}