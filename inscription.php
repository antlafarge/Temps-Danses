<?php include_once('php/start.php'); ?>

<h2>Inscription</h2>

<div class="row">
	<div class="col-md-12">

		<p class="well">
			L'inscription est obligatoire si vous souhaitez prendre des cours de danse.
			<br>
			Les données que vous fournissez resteront confidentielles et ne seront jamais transmises à des partenaires sans votre accord préalable.
			<br>
			<br>
			Si vous souhaitez modifier une information vous concernant, contactez <a href="contact.php">Véronique Salé</a>
		</p>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Formulaire d'inscription</h3>
			</div>
			<div class="panel-body">

			<form class="form-horizontal" role="form">
			  <div class="form-group">
			    <label for="inputFirstname" class="col-sm-2 control-label">Prénom</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputFirstname" placeholder="Prénom">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputLastname" class="col-sm-2 control-label">Nom</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputLastname" placeholder="Nom">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputAdresse" class="col-sm-2 control-label">Adresse</label>
			    <div class="col-sm-10">
			  	  <textarea class="form-control" id="inputAdresse" rows="2" placeholder="Adresse complète"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPhone" class="col-sm-2 control-label">Téléphone</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPhone" placeholder="Téléphone">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputJob" class="col-sm-2 control-label">Profession</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputJob" placeholder="Profession">
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2 control-label">
				  <input type="checkbox" id="inputNewsletter" value="">
			    </div>
			    <label for="inputNewsletter" class="col-sm-10 form-control-static">
				    Newsletter <em><small>(e-mail d'information concernant l'école de dance uniquement)</small></em>
				</label>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Inscription</button>
			    </div>
			  </div>
			</form>

			</div>
		</div>

	</div>
</div>

<?php include_once('php/end.php'); ?>
