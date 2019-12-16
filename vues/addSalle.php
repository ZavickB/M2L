
<div class="jumbotron">
<form action ="index.php?action=post"  method="post">
<div div class="form-group" >Nom de la salle<input type="text" name='nom_salle' /> <br/> </div>
    <div class="form-group">
        <label for="exampleSelect1" name="" >Nombre de places</label>
        <select name="nb_places" class="form-control"> 
          <option value="15">15</option>
          <option value="30">30</option>
        </select>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="informatisee" id="customSwitch1"
                <?= isset($salle['informatisee']) ? coché_informatisée($salle['informatisee'])? ' checked=""' : '' : '';   ?> >
            <label for="customSwitch1" class="custom-control-label">Informatisée</label>
        </div>
    </div>
<input type="submit" class="btn btn-primary" value='Envoyer'/>
</form>
</div>
