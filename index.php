<?php
session_start();
include('fonctions.php');
include('modeles/users.php');
if(!isset($_GET['action'])){
    $_GET['action']="home";
};

switch($_GET['action']) {
    case "home":
        include('controleurs/home.php');
    break;

    case "auth":
        if(auth($_POST['login'], $_POST['mdp'])) {
            $_SESSION['user']=getUser($_POST['login'],$_POST['mdp']);
            $_SESSION['auth']=TRUE;
            header("Location: index.php?action=home");
        }
        else {
            include('controleurs/logging.php');
        }
    break;

    case "disconnect":
        unset($_SESSION['auth']);
        header("Location: index.php?action=home");
    break;

    case "addUser":
        include('controleurs/addUser.php'); 
    break ;
    
    case "ajoutUser":
        ajoutUser($_POST);
        header("Location: index.php?action=auth");
        exit();
    break ;

    case "affSalles":
        include('controleurs/affSalles.php');
    break;

    case "affLigues":
        include('controleurs/affLigues.php');
    break;
    
    case "myAccount":
        include('controleurs/myAccount.php');
    break;

    case "logging":
        include('controleurs/logging.php');
    break;
    
    case "calendar":
        include('controleurs/calendar.php');
    break;
    
    case "event":
        include('controleurs/event.php');
    break;
    
    case "bloquer_salle":
        if($salle['bloquee']=='1'){
        $salle['bloquee']='0';}
        elseif($salle['bloquee']=='0') {
        $salle['bloquee']='1';}
        header("Location: index.php?action=affSalles");
    break;
        
}
    
?>