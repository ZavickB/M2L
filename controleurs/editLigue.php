<?php
include('./modeles/ligues.php');
$req= $pdo->query("SELECT * FROM ligues where id_ligue=".$_GET['idLigue']);
$ligue= $req->fetch();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
        if (empty($data['bloquee'])){
            $data['bloquee'] = 0;
        } else {
            $data['bloquee'] =1;
        }
        $req = $pdo->prepare('UPDATE ligues SET nom_ligue = ?, abreviation = ? , contact = ?  WHERE id_ligue = ?');
        $req->execute([
            $data['nom_ligue'],
            $data['abreviation'],
            $data['contact'],
            $_GET['idLigue']
        ]);
        $_SESSION['flash']['success'] = "la modification à été prise en compte";
        header('location: index.php?action=affLigues');
        exit();
    }



pages('editLigue',['title' => 'M2L - Modification de ligue' ,'ligue' => $ligue, 'admin' => $admin]);


