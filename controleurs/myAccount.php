<?php

$pdo = get_pdo();

$req = $pdo->query("SELECT * FROM users WHERE id_ligue > 0");
$leagues = $req->fetchall();

if (!empty($_POST)){
    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $_SESSION['flash']['danger'] = 'Les mot de passe sont ne correspondent pas';
    } else {
        $user_id = $_SESSION['user']['id_user'];
        $password = ($_POST['password']);
        $pdo = get_pdo();
        $pdo->prepare('UPDATE users SET mdp = ? WHERE id_user = ?')->execute([$password, $user_id]);
        $_SESSION['flash']['success'] = 'Le changement à bien été effectué';
        header('location: index.php?action=home');
        exit();
    }
}

pages('myAccount', ['title' => 'M2L - Mon compte']);