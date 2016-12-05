<div class="cd-section">
	<div class="row">
		<div class="tim-typo">
			<h2 class="title">Actualités</h2>
		</div>
	</div>
</div>
<div class="section">

	<div class="col-md-8">
		<?php foreach ( $context->messages as $message ) : ?>
			<div class="card">
				<?php if($context->isPicture): ?>
				<div class="card-image">
					<img src="<?= $message->post->image; ?>" alt="" class="img">
				</div>
				<?php endif; ?>
				<div class="content">
					<p class="card-description">
						<?= $message->post->texte; ?>
					</p>
					<div class="footer">
						<div class="author">
							<a href="">
								<?php if(!empty($message->emetteur->avatar)): ?>
									<img class="avatar img-rounded" src="<?= $message->emetteur->avatar; ?>">
								<?php else: ?>
									<img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
								<?php endif; ?>
								<span>
									<?= ucfirst( $message->emetteur->prenom ) ?> <?= ucfirst( $message->emetteur->nom ) ?>
								</span>
							</a>
							<i class="material-icons">play_arrow</i>
							<a href="">
								<span>
									<?= ucfirst( $message->destinataire->prenom ) ?> <?= ucfirst( $message->destinataire->nom ) ?>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</div>
</div>
<!--<hr>
<?php //foreach ( $context->messages as $message ): ?>
	<!--<div>
		<p>Message du
			<!--user: <?/*= $message->emetteur->prenom; */?> <?/*= $message->emetteur->nom; */?> <?/*= $message->id; */?> <?/*= $message->post->date->format( "d-m-Y" ); */?></p>
		<p> <?/*= $message->post->texte; */?> ecrit
			par <?/*= $message->emetteur->prenom; */?> <?/*= $message->emetteur->nom; */?> à destination
			de <?/*= $message->destinataire->prenom; */?> <?/*= $message->destinataire->nom; */?> (le parent étant
			: <?/*= $message->parent->id; */?>)</p>-->
	<!--</div>
	<hr>-->
<?php //endforeach; ?>

