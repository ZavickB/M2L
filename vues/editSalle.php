
<div class="jumbotron">
<h1><?= $salle['nom_salle'];?></h1>
<form action =""  method="post">
<div div class="form-group" >Nom de la salle<input type="text" name='nom_salle' value='<?= $salle['nom_salle'];?>' /> <br/> </div>
    <div class="form-group">
        <label for="exampleSelect1" name="" >Nombre de places</label>
        <select name="nb_places" class="form-control"> 
            <?php if($salle['nb_places']=='15'){
                echo'<option value="15" selected="selected">15</option>';
            }
             else{
                echo'<option value="15">15</option>';
             }
                if($salle['nb_places']=='30'){
                echo'<option value="30" selected="selected">30</option>';
            }
             else{
                echo'<option value="30">30</option>';
             }
            ?>;
          ;
        </select>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="informatisee" id="customSwitch1"
                <?php if($salle['informatisee']=='1'){echo'checked=""';}
                      else{ echo'';}?> >
            <label for="customSwitch1" class="custom-control-label" >Informatisée</label>
        </div>
    </div>
<input type="submit" class="btn btn-primary" value='Envoyer'/>
</form>
</div>
 
    </body>
</html>
