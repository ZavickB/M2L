<?php


/********************************************************
***     FONCTIONS    ************************************
********************************************************/

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

/*
 *Insere un nouvel utilisateur
 */
function ajoutUser($tbData){
    $tbData['role']='0';
    $tbData['bloque']='0';
    ecrire("users",$tbData);
}

function auth($login,$mdp){
//	echo select("SELECT count(*) FROM users where login='".$login."' and mdp='".$mdp."'");
    return select("SELECT count(*) FROM users join ligues on users.id_ligue = ligues.id_ligue where login='".$login."' and mdp='".$mdp."'",0)==1;

}

/**
 * verif bloquage
 */
function isBloque($login,$mdp){
    return select("SELECT count(*) FROM users join ligues on users.id_ligue = ligues.id_ligue where login='".$login."' and mdp='".$mdp."'and ( users.bloque ='1' or ligues.bloquee ='1') ",0)==1;
}

function getUser($login,$mdp){
    $tab= select("SELECT * FROM users where login='$login' and mdp='$mdp'",1);
    return $tab;
}

function getUserLigue($id_user){
    $result=requete("SELECT nom_ligue FROM ligues WHERE id_ligue=(SELECT id_ligue FROM users where id_user=".$id_user.")" );
    $result=mysqli_fetch_assoc($result);
    return $result['nom_ligue'];
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

/**
 * fonction de déconnexion
 *
 * @return void
 */
function logout(){
    unset($_SESSION['auth'],$_SESSION['admin'], $_SESSION['user']);
    $_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté(e)';
}

function bloquerUser($idUser) {
    requete("UPDATE users SET bloque='1' WHERE id_user=".$idUser);
}

function debloquerUser($idUser){
    requete("UPDATE users SET bloque='0' WHERE id_user=".$idUser);
}