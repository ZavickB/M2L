<?php
require 'modeles/ligues.php';
$tabLigues=getLigues();

$pdo = get_pdo();
$req= $pdo->query("SELECT * FROM users where id_user=".$_GET['idUser']);
$user= $req->fetch();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
        if (empty($data['bloque'])){
            $data['bloque'] = 0;
        } else {
            $data['bloque'] =1;
        }
        $req = $pdo->prepare('UPDATE users SET nom_user = ?, pnom_user = ? , mail = ?, id_ligue = ? WHERE id_user = ?');
        $req->execute([
            $data['nom_user'],
            $data['pnom_user'],
            $data['mail'],
            $data['id_ligue'],
            $_GET['idUser']
        ]);
        $_SESSION['flash']['success'] = "la modification à été prise en compte";
        header('location: index.php?action=affUsers'); 
        exit();
    }



pages('editUser',['title' => 'M2L - Modification de l utilisateur' ,'user' => $user, 'admin' => $admin, 'pdo' => $pdo, 'tabLigues' => $tabLigues]);
