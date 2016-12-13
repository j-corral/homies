<!DOCTYPE html>
<html lang="fr">
<head>
	<?php include_once "partials/head.php"; ?>
</head>
<body class="index-page">

	<!-- Navbar -->
	<?php include_once "partials/navbar.php"; ?>

	<!-- Main -->
	<div id="main-container" class="wrapper">
		<!-- Header -->
		<?php //include_once "partials/header.php"; ?>

		<div class="main">
			<div class="profile-content">
				<div class="container">

					<div class="row">
						<?php include_once $template_view; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Chat -->
	<?php if($context->isLogged()) include_once "partials/chat.php"; ?>

	<!-- Footer -->
	<?php include_once "partials/footer.php"; ?>

	<!-- Scripts -->
	<?php include_once "partials/scripts.php"; ?>

	<!-- Notifications -->
	<?php //include_once "partials/notification.php"; ?>
</body>
</html>