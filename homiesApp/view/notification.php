<?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif'])): ?>
<script type="text/javascript">
	$(document).ready(function () {
		var msg = '<?= $_SESSION['notif']['message'] ?>';
		var duration = '<?= $_SESSION['notif']['duration'] ?>';
		var style = '<?= json_encode($_SESSION['notif']['type']); ?>';
		Materialize.toast(msg, duration, style);
	});
</script>
	<?php $context->resetNotif(); ?>
<?php endif; ?>