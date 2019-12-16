<div class="jumbotron">
<!-- <?php var_dump($_POST);?> -->
<h1><?= $ligue['nom_ligue'];?></h1>
<form action =""  method="post">
<div div class="form-group" >Nom de la ligue<input type="text" name="nom_ligue" value="<?= $ligue['nom_ligue'];?>" /> <br/> </div>
<div class="form-group" >Abréviation<input type="text" name="abreviation" value="<?= $ligue['abreviation'];?>"/> </br> </div>
<div class="form-group" >Contact<input type="text" name="contact" value="<?= $ligue['contact'];?>"/> </br> </div>
</div>
<input type="submit" class="btn btn-primary" value='Envoyer'/>
</form>
</div>
 
