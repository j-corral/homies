<div class="row section">

	<form id="User" method="post" action="monApplication.php?action=login">

		<h3 class="col offset-s0 s12 offset-m2 m8 offset-l3 l6">Se connecter</h3>

<!--		<input id="action" type="hidden" name="action" value="login">-->

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
			<input type="submit" value="Login">
			<!--<button id="submit" type="submit" name="action" class="btn light-blue lighten-1 waves-effect waves-light col offset-s7 s5 offset-m7 m3 offset-l6 l3">Login
				<i class="material-icons right">send</i>
			</button>-->
		</div>
	</form>
</div>