<!--<div class="row section">

	<form id="User" method="post" action="<?/*= $context->link('login'); */?>">

		<h3 class="col offset-s0 s12 offset-m2 m8 offset-l3 l6">Se connecter</h3>

		<div class="row">
			<div class="input-field col offset-s0 s12 offset-m2 m8 offset-l3 l6">
				<i class="material-icons prefix">face</i>
				<input id="user" name="user" type="text"  class="validate" />
				<label for="user" data-success="" data-error="">User</label>
			</div>

			<div class="input-field col offset-s0 s12 offset-m2 m8 offset-l3 l6">
				<i class="material-icons prefix">vpn_key</i>
				<input id="password" name="password" type="password"  class="validate" />
				<label for="password" data-success="" data-error="">Password</label>
			</div>
		</div>

		<div class="row">
			<button class="btn light-blue lighten-1 waves-effect waves-light col offset-s7 s5 offset-m7 m3 offset-l6 l3">
				<input type="submit" value="Login">
			</button>
		</div>
	</form>
</div>-->


<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
	<div class="card card-signup">
		<form class="form" method="post" action="<?= $context->link('login'); ?>">
			<div class="content">

				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">face</i>
					</span>
					<div class="form-group form-info label-floating is-empty">
						<label class="control-label">Nom d'utilisateur</label>
						<input type="text" name="user" class="form-control">
						<span class="material-input"></span>
					</div>
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">lock_outline</i>
					</span>
					<div class="form-group form-info label-floating is-empty">
						<label class="control-label">Mot de passe</label>
						<input type="password" name="password" class="form-control">
						<span class="material-input"></span>
					</div>
				</div>

			</div>
			<div class="footer text-center">
				<input type="submit" class="btn btn-info btn-simple btn-wd btn-lg"  value="Se connecter"/>
			</div>
		</form>
	</div>
</div>