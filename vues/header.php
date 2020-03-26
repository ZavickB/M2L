<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="./IMAGES/LOGO M2L/Orage2.png">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./Public/css/lux/bootstrap.min.css">
    <link rel="stylesheet" href="./Public/css/calendar.css">
    <link rel="stylesheet" href="./Public/css/stylesheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title><?= $title ;?></title>
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php?action=home"><img src="./IMAGES/LOGO M2L/Orage2.png" style="height : 6vh"></a>

        
        <button id="showmenu"class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
               
                <?php if(isset($_SESSION['auth'])):?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=myAccount">Mon compte 
                        <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=calendar">Calendrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=affSalles">Salles de classe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=affLigues">Ligues de sport</a>
                    </li> 
                <?php if($_SESSION['user']['role']== '1'){
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=affUsers">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?action=affEquips">Equipements</a>
                    </li>';} 
                ;?>     
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=disconnect">Déconnexion</a>
                    </li>
 
                <?php else: ?>     
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logging">Se connecter</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
             <?php if(isset($_SESSION['flash'])): ?>
                <?php foreach($_SESSION['flash'] as $type => $message): ?>
                    <div class="alert alert-<?= $type; ?>">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

    </nav>
<div class="content">
    