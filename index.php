<?php
session_start();
require('./modeles/fonctions.php');
require('./modeles/users.php');
if(!isset($_SESSION['user']['role'])){
    $_SESSION['user']['role'] = '0' ;}
$admin = isAdmin($_SESSION['user']['role']);

if(!isset($_GET['action'])){
    $_GET['action']="home";
};

switch($_GET['action']) {
    case "home":
        include('controleurs/home.php');
    break;

    case "auth":
        if(auth($_POST['login'], $_POST['mdp'])) {
            if(isBloque($_POST['login'], $_POST['mdp'])){
                $_SESSION['flash']['danger'] = "Vous ou votre ligue êtes bloqué(e), veuillez contacter l'administration";
                header("Location: index.php?action=logging");
            }
            else{
            $_SESSION['user']=getUser($_POST['login'],$_POST['mdp']);
            $_SESSION['auth']=TRUE;
            $_SESSION['flash']['success'] = "Vous êtes maintenant connecté(e)";
            header("Location: index.php?action=home");
            }
        }        
        else {
            $_SESSION['flash']['danger'] = "Erreur identifiant(s), veuillez réessayer ! ";
            header("Location: index.php?action=logging");
        }
    break;

    case "disconnect":
        logout();
        header('location: index.php?action=home');
    break;
    
    case "ajoutUser":
        ajoutUser($_POST);
        header("Location: index.php?action=auth");
        exit();
    break ;

    case "ajoutSalle":
        require('modeles/salles.php');
        ajoutSalle($_POST);
        header("Location: index.php?action=affSalles");
        exit();
    break ;    
    
    case "ajoutLigue":
        require('modeles/ligues.php');
        ajoutLigue($_POST);
        header("Location: index.php?action=affLigues");
        exit();
    break ; 
    
    case "affEquips":
        include('controleurs/affEquips.php');
    break;
        
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
    
    case "affEvent":
        include('controleurs/affEvent.php');
    break;

    case "addEvent":
        include('controleurs/addEvent.php');
    break;


    case "post": 
        include ('vues/post.php');
    break;
    
    case "editSalle":
        include('controleurs/editSalle.php');
    break;

    case "bloquerSalle":
        include('./modeles/salles.php');
        bloquerSalle($_GET['idSalle']);
        header('Location:index.php?action=affSalles');
    break;

    case "debloquerSalle":
        include('./modeles/salles.php');
        debloquerSalle($_GET['idSalle']);
        header('Location:index.php?action=affSalles');
    break;

    case "editLigue":
        include('controleurs/editLigue.php');
    break;

    case "bloquerLigue":
        include('./modeles/ligues.php');
        bloquerLigue($_GET['idLigue']);
        header('Location:index.php?action=affLigues');
    break;

    case "debloquerLigue":
        include('./modeles/ligues.php');
        debloquerLigue($_GET['idLigue']);
        header('Location:index.php?action=affLigues');
    break;

    case "bloquerUser":
        bloquerUser($_GET['idUser']);
        header('Location:index.php?action=affUsers');
    break;

    case "debloquerUser":
        debloquerUser($_GET['idUser']);
        header('Location:index.php?action=affUsers');
    break;

    
    case "affUsers":
        include('controleurs/affUsers.php');
    break;

    case "editUser":
        include('controleurs/editUser.php');
    break;
}
;
?>
