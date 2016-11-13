<?php if($context->getSessionAttribute('user') != null): ?>
	<p><strong><?= ucfirst($context->getSessionAttribute('user')->identifiant) ?></strong></p>
<?php endif; ?>
<p>Bienvenue sur Homies.</p>
