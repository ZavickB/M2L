<?php
require 'controleurs/equipements.php';
include 'modeles/salles.php';
require 'modeles/calendar/Events.php';

//logged_only();
$pdo = get_pdo();
$data = [
    'date' => $_GET['date'] ?? date('Y-m-d'),
    'start' => $_GET['date'] ?? date('H:i'),
    'end' => $_GET['date'] ?? date('H:i')
];

$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    if ($data['start'] >= $data['end']){
        $errors=['date'];
    }
    if (empty($errors)){
        $start=$data['date'].' '.$data['start'];
        $end=$data['date'].' '.$data['end'];
        $informatisee = isset($data['informatisee']) ? coché_informatisée($data['informatisee'])? '1' : '0' : '0';
        $nb_places = $data['nb_places'];
        $titre = $data['titre'];
        $description = $data['description'];
        $id_equip = $data['idequip'];
        $user=$_SESSION['user']['id_user'];
        $result=1;
        // utilisation de la procédure stockée
        $req = $pdo->prepare("CALL resSalle(?,?,?,?,?,?,?,?)");
        $req->execute([ $start,
                        $end,
                        $informatisee,
                        $user,
                        $nb_places,
                        $titre,
                        $description,
                        $id_equip ]);
        $row=$req->fetch();
                    if ($row['result']==1){
                       header('Location: index.php?action=calendar');
                       $_SESSION['flash']['success'] = "L'évènement à bien été créé";
                       exit();
                   } else {
                       $_SESSION['flash']['danger'] = "Aucune salle ne peut remplir vos conditions";
                   }
        } 
    else {
            $_SESSION['flash']['danger'] = "Merci de bien vouloir corriger vos erreurs";
    }  

}  
pages('addEvent',['title' => 'M2N - Nouvel évènement', 'data' => $data, 'equipements' =>$equipements ,  'errors' => $errors]);