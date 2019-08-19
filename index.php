<?php
session_start();
include("fonctions.php");

 if(!isset($_GET['action'])){
        $_GET['action']="affSalles";};
  
  switch($_GET['action']) {
    case "":
        include('vues/affSalles.php');
    break;
    
    case "home":
        include('vues\home.php');
    break;
    
    case "myDay":
         include('vues\myDay.php');
    break;

    case "auth":
        if(auth($_POST['login'], $_POST['mdp'])) {
            $_SESSION['user']=getUser($_POST['login'],$_POST['mdp']);
            $_SESSION['auth']=TRUE;
            header("Location: index.php?action=affSalles");

        }
        else {
          include('vues/logging.php');
        }
    break;

    case "disconnect":
        unset($_SESSION['auth']);
        
              header("Location: index.php?action=affSalles");
    break;

    case "addUser":
        $tabligues=getLigues();
       include('vues/addUser.php');
    break ;
    
    case "ajoutUser":
       ajoutUser($_POST);
       header("Location: index.php?action=logging");
    break ;
        
    case "affSalles":
        include('vues/affSalles.php');
    break;

    case "formAuth":
        include('vues/logging.php');
    break;
    
    case "calendar":
            include('vues/calendar.php');
    break;
  } // FIN SWITCH
  ?>
