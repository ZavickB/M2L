<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Public/css/calendar.css">


    <title>Maison des Ligues de Lorraine</title>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php?action=home">Accueil</a>
        
        <button id="showmenu"class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <?php if( isset($_SESSION['auth']) and $_GET['action'] !== 'logging'):?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=myDay">Ma journée</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=account">Mon compte 
                            <span class="sr-only">(current)</span></a>
                    </li>
                <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=calendar">Calendrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=affSalles">Salles de classe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=league">Ligues de sport</a>
                    </li> 

                       
                <?php if( ! isset($_SESSION['auth'])):?>     
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=formAuth">Se connecter</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=disconnect">Déconnexion</a>
                    </li>
                <?php endif; ?>
                                    <!-- echo '<a id="login" href="index.php?action=logging">Connexion</a>';
                                      }

                                    elseif(isset($_SESSION['auth']) and $_GET['action'] !== 'formAuth') {
                                      //var_dump($_SESSION);
                                      echo '<p id="user">Bonjour '.$_SESSION['user'].'</p>';
                                      echo '<a id="login" href="index.php?action=disconnect">Déconnexion</a>';
                                      }
                            ?-->
            </ul>
        </div>
    </nav>
