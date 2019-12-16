<div class="jumbotron container">
    <h1>Bonjour 
        <?= $_SESSION['user']['nom_user']." ".$_SESSION['user']['pnom_user'];?><br>
            <small class="text-muted-succes"><?= getUserLigue($_SESSION['user']['id_user']);?></small><br>
    </h1>
    
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Changer de mot de passe</label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Confirmez votre nouveau mot de passe</label>
            <input type="password" name="password_confirm" class="form-control"/>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Valider le changement</button>
        </div>
    </form>
</div>
