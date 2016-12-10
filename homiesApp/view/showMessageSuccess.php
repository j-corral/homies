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
							<i class="material-icons icon-min">play_arrow</i>
							<a href="">
								<span>
									<?= ucfirst( $message->destinataire->prenom ) ?> <?= ucfirst( $message->destinataire->nom ) ?>
								</span>
							</a>
						</div>
					</div>
				</div>

				<div class="div-btn-actions">
					<div class="content btn-action btn-group" role="group" aria-label="...">
						<button type="button" class="btn btn-default button-action">
							<a href="">
								<label class="label-btn-action">Like</label>
								<i class="material-icons">thumb_up</i>
							</a>
						</button>
						<button type="button" class="btn btn-default button-action">
							<a href="">
								<label class="label-btn-action">Comment</label>
								<i class="material-icons">comment</i>
							</a>
						</button>
						<button type="button" class="btn btn-default button-action">
							<a href="">
								<label class="label-btn-action">Share</label>
								<i class="material-icons">share</i>
							</a>
						</button>
					</div>

					<span class="content content-date">Posté le <?= date_format($message->post->date, 'j M. à H:i'); ?></span>
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

