<?php


/********************************************************
***     FONCTIONS    ************************************
********************************************************/

/*
 *Insere un nouvel utilisateur
 */
function ajoutUser($tbData){
    $tbData['role']='0';
    ecrire("users",$tbData);
}

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
    $tab= select("SELECT * FROM users where login='$login' and mdp='$mdp'",1);
    return $tab;
}

/*
 * return TRUE if user is admin
 */
function isAdmin($role){
    if($role == '1'){
        $admin='TRUE'    
    ;}
    else{
        $admin='FALSE'
    ;} 
    return $admin;
}
