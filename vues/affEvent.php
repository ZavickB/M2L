<?php var_dump($event) ;?>

<div class="jumbotron">
    <div class="card">
        <h3 class="card-header"><?= h($event->nom_salle);?></h3>
    <div class="card-body">
        <h1 type="button" class="btn btn-info btn-lg btn-block"><?= h($event->titre);?></h1>
    </div>
    </div>    
<br/>
<div class="jumbotron-fluid">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
        <div class="card-header">Date</div> 
        <div class="card-body">
            <div class="card-text"> <?= $event->getStart() ->format('d/m/y');?></div>
            <div class="card-text"> Heure de démarrage : <?= $event->getStart() ->format('H:i');?></div>
            <div class="card-text"> Heure de fin : <?= $event->getEnd()->format('H:i');?></div>
        </div>
    </div>
     <br/>
  </div>
  <div class="col-sm-6">
    <div class="card">
        <div class="card-header">Description</div>
        <div class="card-body">
            <div class="card-text"> <?= $event -> getDescription() ;?></div>
        </div>  
    </div>
 <br/>
  </div>
  <div class="col-sm-6">
    <div class="card">
        <div class="card-header">Occupation </div>
            <div class="card-body">
                <div class="card-text"><?=$event->nb_personnes;?>/<?=$event->nb_places;?></div>
            </div>
    </div>
  </div>
 <br/>
  <div class="col-sm-6">
    <div class="card">
        <div class="card-header">Informatisée</div>
        <div class="card-body">
            <div class="card-text" > <?php
            if ($event->informatisee ==1){
                echo 'Oui';}
             else {
                echo 'Non';}
            ;?>
            </div>
        </div>
    </div>  
  </div>
  <div class="col-sm-6">
    <div class="card">
        <div class="card-header">Equipements</div>
        <div class="card-body">
            <div class="card-text" > <?php
                  $libelle
            ;?>
            </div>
        </div>
    </div>  
  </div>
</div>    
</div>
</div>
