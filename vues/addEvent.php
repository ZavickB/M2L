<div class="jumbotron container">
    <h1>Créer une réservation</h1>

    <form action="" method='post' class="form">
        <?php render('addForm',['data' => $data, 'errors' => $errors]); ?>
        <div class="form-group">
            <button class="btn btn-primary">Ajouter la réservation</button>
        </div>
    </form>
</div>
