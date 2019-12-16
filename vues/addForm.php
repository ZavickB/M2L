        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Titre
                        <small class="text-muted-warning"> * </small>
                    </label>
                    <input id="name" type="text" required class="form-control" name="titre" value="<?= isset($data['titre']) ? h($data['titre']) : ''; ?>">
                    <?php if(isset($errors['titre'])): ?>
                        <small class="help-block text-muted "><?= $errors['titre']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Date
                        <small class="text-muted-warning"> * </small>
                    </label>
                    <input id="date" type="date" required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
                    <?php if(isset($errors['date'])): ?>
                        <small class="help-block text-muted "><?= $errors['date']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start">Démarrage
                        <small class="text-muted-warning"> * </small>
                    </label>
                    <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? h($data['start']) : ''; ?>">
                    <?php if(isset($errors['start'])): ?>
                        <small class="form-text text-muted "><?= $errors['start']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="end">Fin
                        <small class="text-muted-warning"> * </small>
                    </label>
                    <input id="end" type="time" required class="form-control" name="end" placeholder="HH:MM" value="<?= isset($data['end']) ? h($data['end']) : ''; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nb_places">Nombre de place
                        <small class="text-muted-warning"> * </small>
                    </label>
                    <input id="nb_places" type="int" required class="form-control" name="nb_places" value="<?= isset($data['nb_places']) ? h($data['nb_places']) : ''; ?>">
                    <?php if(isset($errors['nb_places'])): ?>
                        <small class="help-block text-muted "><?= $errors['nb_places']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="informatisee" id="customSwitch1"
                    <?= isset($salle['informatisee']) ? cochéinformatisée($salle['informatisee'])? ' checked=""' : '' : '';   ?> >
                <label for="customSwitch1" class="custom-control-label">Informatisée</label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description" ><?= isset($data['description']) ? h($data['description']) : ''; ?></textarea>
        </div>