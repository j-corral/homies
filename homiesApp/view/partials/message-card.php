<?php foreach ( $context->messages as $message ) : ?>

	<?php if ( isset( $message->destinataire->prenom ) && isset( $message->destinataire->nom ) ): ?>

		<?php if ( isset( $message->parent->prenom ) && isset( $message->parent->nom )
		           && ( $message->parent->id ) != ( $message->emetteur->id )
		): ?>

			<div class="card">
			<div class="content">
			<div class="author author-shared">
				<a href="<?= $context->link( 'showProfile&id=' . $message->emetteur->id ) ?>">
					<?php if ( ! empty( $message->emetteur->avatar ) ): ?>
						<img class="avatar img-rounded" src="<?= $message->emetteur->avatar; ?>">
					<?php else: ?>
						<img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
					<?php endif; ?>
					<span class="text-bold">
                                        <?= ucfirst( $message->emetteur->prenom ) ?> <?= ucfirst( $message->emetteur->nom ) ?>
                                    </span>
				</a>
				<span class="text-gray"> has shared this post.</span>
			</div>
		<?php endif; ?>
		<div class="card">
			<div class="content">
				<div class="author">
					<?php if ( ( $message->parent->id ) == ( $message->destinataire->id ) ): ?>
						<a href="<?= $context->link( 'showProfile&id=' . $message->parent->id ) ?>">
							<?php if ( ! empty( $message->parent->avatar ) ): ?>
								<img class="avatar img-rounded" src="<?= $message->parent->avatar; ?>">
							<?php else: ?>
								<img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
							<?php endif; ?>
							<span class="text-bold">
                                                    <?= ucfirst( $message->parent->prenom ) ?> <?= ucfirst( $message->parent->nom ) ?>
                                                </span>
						</a>
						<span class="text-gray"> has published on his wall.</span>
					<?php else: ?>
						<a href="<?= $context->link( 'showProfile&id=' . $message->parent->id ) ?>">
							<?php if ( ! empty( $message->parent->avatar ) ): ?>
								<img class="avatar img-rounded" src="<?= $message->parent->avatar; ?>">
							<?php else: ?>
								<img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
							<?php endif; ?>
							<span class="text-bold">
                                                    <?= ucfirst( $message->parent->prenom ) ?> <?= ucfirst( $message->parent->nom ) ?>
                                                </span>
						</a>
						<i class="material-icons icon-min">play_arrow</i>
						<a href="<?= $context->link( 'showProfile&id=' . $message->destinataire->id ) ?>">
                                                <span class="text-bold">
                                                    <?= ucfirst( $message->destinataire->prenom ) ?> <?= ucfirst( $message->destinataire->nom ) ?>
                                                </span>
						</a>
					<?php endif; ?>
				</div>

				<?php if ( isset( $message->parent->prenom ) && isset( $message->parent->nom )
				           && ( $message->parent->id ) != ( $message->emetteur->id )
				): ?>
					<span
						class="content grey-date">Posted on <?= $message->post->date->format( 'j F \a\t g:i a' ); ?></span>
				<?php endif; ?>

				<div class="card-description">
					<h3><?= $message->post->texte; ?></h3>
					<?php if ( $message->post->image ): ?>
						<div class="image-container" style="margin: 15px 0;">
							<img src="<?= $message->post->image; ?>" alt=""
							     class="img-rounded img-responsive">
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( isset( $message->parent->prenom ) && isset( $message->parent->nom )
			           && ( $message->parent->id ) == ( $message->emetteur->id )
			): ?>
				<div class="div-btn-actions">
					<div class="content btn-action btn-group" role="group" aria-label="...">
						<button id="like_<?= $message->id ?>" type="button"
						        class="btn btn-default button-action">
							<?php if ( ! isset( $message->aime ) || $message->aime == null ) {
								$message->aime = 0;
							} ?>
							<label class="label-btn-action"><span
									class="badge"><?= $message->aime ?></span>Like</label>
							<i class="material-icons icon-like">thumb_up</i>
						</button>
						<button type="button" class="btn btn-default button-action cursor-not-allowed">
							<label class="label-btn-action cursor-not-allowed"">Comment</label>
							<i class="material-icons">comment</i>
						</button>
						<button type="button" class="btn btn-default button-action">
							<a href="">
								<label class="label-btn-action">Share</label>
								<i class="material-icons">share</i>
							</a>
						</button>
					</div>
					<?php if ( ( $message->parent->id ) == ( $message->emetteur->id ) ): ?>
						<span
							class="content content-date">Posted on <?= $message->post->date->format( 'j F \a\t g:i a' ); ?></span>
					<?php endif; ?>
				</div>

			<?php endif; ?>
		</div>

		<?php if ( isset( $message->parent->prenom ) && isset( $message->parent->nom )
		           && ( $message->parent->id ) != ( $message->emetteur->id )
		): ?>
			<div class="div-btn-actions-shared">
				<div class="content btn-action btn-group content-btn-actions-shared" role="group"
				     aria-label="...">
					<button id="like_<?= $message->id ?>" type="button"
					        class="btn btn-default button-action">
						<?php if ( ! isset( $message->aime ) || $message->aime == null ) {
							$message->aime = 0;
						} ?>
						<label class="label-btn-action"><span class="badge"><?= $message->aime ?></span>Like</label>
						<i class="material-icons icon-like">thumb_up</i>
					</button>
					<button type="button" class="btn btn-default button-action cursor-not-allowed">
						<label class="label-btn-action cursor-not-allowed"">Comment</label>
						<i class="material-icons">comment</i>
					</button>
					<button type="button" class="btn btn-default button-action">
						<a href="">
							<label class="label-btn-action">Share</label>
							<i class="material-icons">share</i>
						</a>
					</button>
				</div>
				<?php if ( ( $message->parent->id ) == ( $message->emetteur->id ) ): ?>
					<span
						class="content content-date">Posted on <?= $message->post->date->format( 'j F \a\t g:i a' ); ?></span>
				<?php endif; ?>
			</div>
			</div>
			</div>
		<?php endif; ?>

	<?php endif; ?>

<?php endforeach; ?>