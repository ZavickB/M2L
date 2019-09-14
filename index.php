<?php
session_start();
include("fonctions.php");
if(!isset($_GET['action'])){
    $_GET['action']="home";
};

switch($_GET['action']) {
    case "home":
        include('vues/header.php');
        include('vues/home.php');
        include('vues/footer.php');
    break;

    case "auth":
        if(auth($_POST['login'], $_POST['mdp'])) {
            $_SESSION['user']=getUser($_POST['login'],$_POST['mdp']);
            $_SESSION['auth']=TRUE;
            header("Location: index.php?action=home");
        }
        else {
        include('vues/header.php');
        include('vues/logging.php');
        include('vues/footer.php');
        }
    break;

    case "disconnect":
        unset($_SESSION['auth']);
        header("Location: index.php?action=home");
    break;

    case "addUser":
        $tabligues=getLigues();
        include('vues/header.php');
        include('vues/addUser.php');
        include('vues/footer.php');
    break ;
    
    case "ajoutUser":
        ajoutUser($_POST);
        header("Location: index.php?action=auth");
        exit();
    break ;

    case "affSalles":
        include('vues/header.php');
        include('vues/affSalles.php');
        include('vues/footer.php');
    break;

    case "affLigues":
        include('vues/header.php');
        include('vues/affLigues.php');
        include('vues/footer.php');
    break;
    
    case "myAccount":
        include('vues/header.php');
        include('vues/myAccount.php');
        include('vues/footer.php');
    break;
    case "formAuth":
        include('vues/header.php');
        include('vues/logging.php');
        include('vues/footer.php');
    break;
    
    case "calendar":
        include('vues/header.php');
        include('vues/calendar.php');
        include('vues/footer.php');
    break;
    
    case "event":
        include('vues/header.php');
        include('vues/event.php');
        include('vues/footer.php');
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