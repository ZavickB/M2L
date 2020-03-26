<?php
//dd($_GET, $_POST);
$pdo = get_pdo();
require 'controleurs/equipements.php';
require 'modeles/calendar/Events.php';
$events = new Calendar\Events($pdo);


if(!isset($_GET['id'])) { 
    header('location:404.php');
}
   
try{
    $event = $events->find($_GET['id']);
} catch(\Exception $e){
    e404();
}

