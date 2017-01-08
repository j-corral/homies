<!--Core Js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/lib/bootstrap.min.js" type="text/javascript"></script>
<script src="js/lib/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="js/lib/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="js/lib/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="js/lib/material-kit.js" type="text/javascript"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/lib/jasny-bootstrap.min.js"></script>

<!-- Jquery UI (draggable, resizable)-->
<script src="js/lib/jquery-ui.js"></script>



<!-- App script	-->
<script type="text/javascript" src="js/notification.js"></script>
<?php if($context->isLogged()) : ?>
<script>
	var default_avatar = "<?= IMG . DS . AVATAR; ?>";
	var profile_link = "<?= $context->link('showProfile&id='); ?>";
</script>
<script type="text/javascript" src="js/app.js"></script>
<?php endif; ?>