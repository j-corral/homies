<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Homies</title>

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="monApplication.php" class="brand-logo">Homies</a>
			<ul class="right hide-on-med-and-down">
				<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
					<li><a href=monApplication.php?action=logout>Logout</a></li>
				<?php else: ?>
					<li><a href="monApplication.php?action=login">Login</a></li>
				<?php endif; ?>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="monApplication.php?action=login">Login</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>
	<div class="container">
		<!--<div id="notif">
			<p>Etat : </p>
		</div>-->
		<?php include($template_view); ?>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>
</html>
