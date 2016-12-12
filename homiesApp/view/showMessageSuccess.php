<div class="cd-section">
	<div class="row">
		<div class="tim-typo">
			<h2 class="title">Actualités</h2>
		</div>
	</div>
</div>
<div class="section">

	<div class="col-md-8">
        <?php foreach ( $context->messages as $message ) :

        if ( isset($message->destinataire->prenom) && isset($message->destinataire->nom) ) {
        ?>
			<div class="card">
				<div class="content">
					<div class="author">
						<a href="<?= $context->link( 'showProfile&id=' . $message->emetteur->id ) ?>">
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
						<a href="<?= $context->link( 'showProfile&id=' . $message->destinataire->id ) ?>">
								<span>
									<?= ucfirst( $message->destinataire->prenom ) ?> <?= ucfirst( $message->destinataire->nom ) ?>
								</span>
						</a>
					</div>
					<div class="card-description">
						<h3><?= $message->post->texte; ?></h3>
						<?php if($message->post->image): ?>
							<div class="image-container" style="margin: 15px 0;">
								<img src="<?= $message->post->image; ?>" alt="" class="img-rounded img-responsive">
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="div-btn-actions">
					<div class="content btn-action btn-group" role="group" aria-label="...">
						<button type="button" class="btn btn-default button-action">
							<span id="like_<?=$message->id?>">
								<?php if( !isset($message->aime) || $message->aime == null ) {$message->aime = 0;} ?>
								<label class="label-btn-action"><span class="badge"><?=$message->aime?></span>Like</label>
								<i class="material-icons icon-like">thumb_up</i>
							</span>
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

					<span class="content content-date">Posté le <?= $message->post->date->format('j M. à H:i'); ?></span>
				</div>
			</div>
		<?php }
        endforeach; ?>
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

