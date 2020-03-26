<?php 
include('modeles/equipements.php');
pages('affEquips',['title' => 'M2L - Liste des equipements', 'equipements' => $equipements, 'admin' => $admin]);
?>