<div class="container">
	<div class="row">
		<?php if ( $context->getSessionAttribute( 'user' ) != null ): ?>
			<p><strong><?= ucfirst( $context->getSessionAttribute( 'user' )->identifiant ) ?></strong></p>
		<?php endif; ?>
		<p>Welcome to Homies.</p>

	</div>
</div>


