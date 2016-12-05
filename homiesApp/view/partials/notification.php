<?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif'])): ?>
	<div class="notification alert alerts<?= $_SESSION['notif']['type']; ?>">
		<div class="container-fluid">
			<div class="alert-icon">
				<i class="material-icons text<?= $_SESSION['notif']['type']; ?>"><?= $_SESSION['notif']['icon']; ?></i>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
			</button>
			<p><?= $_SESSION['notif']['message'] ?></p>
		</div>
	</div>
	<?php $context->resetNotif(); ?>
<?php endif; ?>
