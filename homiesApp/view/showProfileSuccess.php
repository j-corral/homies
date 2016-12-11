<!--<div class="cd-section">
	<div class="row">
		<div class="tim-typo">
			<h2 class="title">Mon profil</h2>
		</div>
	</div>
</div>-->
<div class="parallax"></div>
<div class="section">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-profile">
				<div class="card-avatar">
					<img class="img-rounded img-responsive" src="<?= $context->user->avatar; ?>">
				</div>

				<div class="content">
					<h6 class="category text-gray"><?= $context->user->date_de_naissance->format( "d-m-Y" ); ?></h6>

					<h4 class="card-title"><?= ucfirst( $context->user->prenom ) ?> <?= ucfirst( $context->user->nom ) ?></h4>

					<?php if ( $context->edit ): ?>
						<form method="post" action="<?= $context->link('updateStatus'); ?>">
							<div class="content">

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">face</i>
									</span>
									<div class="form-group form-info label-floating is-focused">
										<label class="control-label">Statut</label>
										<input type="text" name="status" placeholder="Indiquez votre état"
										       value="<?= $context->user->statut ?>" class="form-control">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="footer">
								<input type="submit" class="btn btn-info btn-round" value="Modifier"/>
							</div>
						</form>
					<?php else: ?>
						<i class="material-icons left">face</i>
						<span class="card-description text-info">
							<?= $context->user->statut ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="col-md-8">

			<div class="card">
				<div class="content">
					<h3 class="category text-info">
						<i class="material-icons">create</i>
						Poster un message
					</h3>

					<form method="post" action="<?= $context->link("postMessage") ?>">

						<input type="hidden" name="destinataire" value="<?= $context->user->id ?>">

						<div class="form-group form-info is-empty">
							<textarea name="message" class="form-control" placeholder="Ecrivez quelque chose ici..." rows="6"></textarea>
							<span class="material-input"></span>
						</div>

						<input type="submit" class="btn btn-info pull-right" value="Poster"/>
					</form>
				</div>
			</div>


			<?php foreach ( $context->messages as $message ) :

                if ( isset($message->destinataire->prenom) && isset($message->destinataire->nom) ) {
            ?>
				<div class="card">
					<div class="content">
						<p class="card-description description-texte">
							<?= $message->post->texte; ?>
						</p>
						<div class="footer">
							<div class="author">
                                <a href="<?= $context->link( 'showProfile&id=' . $message->emetteur->id ) ?>">
									<img class="avatar img-raised" src="<?= $context->user->avatar; ?>">
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

						<span class="content content-date">Posté le <?= $message->post->date->format('j M. à H:i'); ?></span>
					</div>
				</div>
			<?php }
            endforeach; ?>
		</div>

	</div>
</div>