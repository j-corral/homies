<?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif'])): ?>
	<nav class="navbar navbar<?= $_SESSION['notif']['type'];?> navbar-fixed-top">
<?php else: ?>
	<nav class="navbar navbar-info navbar-fixed-top">
<?php endif; ?>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?= $context->link(''); ?>">
				<div class="logo-container">
					<div class="logo">
						<img class="img-rounded" src="images/icon.png" alt="Homies Logo" rel="tooltip" title="<b>Homies</b>: Connecting people" data-placement="bottom" data-html="true">
					</div>
					<div class="brand">
						Homies
					</div>
				</div>
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navigation-index">

			<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
				<!-- User Menu -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?= $context->link('showMessage'); ?>">
							<i class="material-icons">dashboard</i> Wall
						</a>
					</li>
					<li>
						<a href="<?= $context->link('showProfile'); ?>">
							<i class="material-icons">account_circle</i> <?= $context->getSessionAttribute('user')->prenom; ?>
						</a>
					</li>
					<li>
						<a href="<?= $context->link('showFriends'); ?>">
							<i class="material-icons">group_add</i> Friends list
						</a>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<i class="material-icons">settings</i>
							<b class="caret"></b>
							<div class="ripple-container"></div></a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li class="dropdown-header">Settings</li>
							<li><a href="#">Account</a></li>
							<li class="divider"></li>
							<li id="logout"><a href="<?= $context->link('logout'); ?>">Logout</a></li>
						</ul>
					</li>
				</ul>
			<?php else: ?>
				<!-- Login Menu -->
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= $context->link('login'); ?>">Login</a></li>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<!-- Notification -->
	<?php include_once "notification.php"; ?>
</nav>
<!-- End Navbar -->


