<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Homies</title>

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">


	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/icon.png" />

	<!-- App style -->
	<link rel="stylesheet" href="css/app.css">

	<!-- Customized forms -->
	<link rel="stylesheet" href="css/forms.css">

</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="<?= $context->link(''); ?>" class="brand-logo">
				<img src="images/homies.png" alt="homies- Connecting people">
			</a>
			<ul class="right hide-on-med-and-down">
				<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
					<li><a id="logout" href="<?= $context->link('logout'); ?>">Logout</a></li>
<!--					<li><a id="logout">Logout</a></li>-->
				<?php else: ?>
					<li><a href="<?= $context->link('login'); ?>">Login</a></li>
				<?php endif; ?>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
					<li><a href="<?= $context->link('logout'); ?>">Logout</a></li>
				<?php else: ?>
					<li><a href="<?= $context->link('login'); ?>">Login</a></li>
				<?php endif; ?>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>
	<div class="container">
		<?php include($template_view); ?>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

	<script type="text/javascript" src="js/app.js"></script>

	<?php include('notification.php'); ?>
</body>
</html>
