<?php
//dd($_GET, $_POST);
$pdo = get_pdo();
require 'SRC/Calendar/Events.php';
$events = new Calendar\Events($pdo);

if(!isset($_GET['id'])) { 
    header('location:404.php');
}
   
try{
    $event = $events->find($_GET['id']);
} catch(\Exception $e){
    e404();
}
?>

<h1><?= $event['nom_salle'];?></h1>
<ul>
    <li class="card border-info mb-3" style="max-width: 20rem;"> <div class="card-header"> Titre </div> <div class="card-body"></div> 
       <div class="card-body">
            <div class="card-text"> <?= h($event['titre']);?> </div>
       </div>
    </li>
    <li class="card border-info mb-3" style="max-width: 20rem;"> <div class="card-header">Date</div> 
        <div class="card-body">
            <div class="card-text"> <?= (new DateTime($event['start']))->format('d/m/y');?></div>
            <div class="card-text"> Heure de démarrage : <?= (new DateTime($event['start']))->format('H:i');?></div>
            <div class="card-text"> Heure de fin : <?= (new DateTime($event['end']))->format('H:i');?></div>
        </div>
    </li> 
    <li class="card border-info mb-3" style="max-width: 20rem;"> <div class="card-header">Description</div>
        <div class="card-body">
            <div class="card-text"> <?= h($event['description']);?></div>
        </div>  
    </li>
    <li class="card border-info mb-3" style="max-width: 20rem;"> 
        <div class="card-header">Occupation </div><div class="card-body">
            <div class="card-text" > <?=$event['nb_personnes'];?>/<?=$event['nb_places'];?></div></div></li> 
    <li class="card border-info mb-3" style="max-width: 20rem;"> 
        <div class="card-header">Informatisée </div><div class="card-body"> 
            <div class="card-text" > <?php
            if ($event['informatisee']==1){
                echo 'Oui';}
             else {
                echo 'Non';}
            ;?>
            </div></div>
    </li>
</ul>
