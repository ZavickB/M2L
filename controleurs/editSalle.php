<?php
include('./modeles/salles.php');

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM salles where id_salle=".$_GET['idSalle']);
$salle = $req->fetch();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    if (!empty($data)){
        if (empty($data['informatisee'])){
            $data['informatisee'] = 0;
        } else {
            $data['informatisee'] =1;
        }
        $req = $pdo->prepare('UPDATE salles SET nom_salle = ?, nb_places = ?, informatisee = ?  WHERE id_salle = ?');
        $req->execute([
            $data['nom_salle'],
            $data['nb_places'],
            $data['informatisee'],
            $_GET['idSalle']
        ]);
        $_SESSION['flash']['success'] = "la modification à été prise en compte";
        header('location: index.php?action=affSalles');
        exit();
    } else{
        $_SESSION['flash']['danger'] = "Veuillez renseigner tout les champs obligatoires";
    }
}

pages('editSalle',['title' => 'M2L - Modification de salle' ,'salle' => $salle, 'admin' => $admin]);






