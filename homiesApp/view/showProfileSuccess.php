<!-- Author: Kenny -->
<!--<div class="cd-section">
	<div class="row">
		<div class="tim-typo">
			<h2 class="title">Mon profil</h2>
		</div>
	</div>
</div>-->

<div class="section">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-profile">
				<div class="card-avatar">
					<img class="img-rounded img-responsive" src="<?= $context->user->avatar; ?>">
				</div>

				<div class="content">
                    <i class="material-icons">cake</i>
                    <h6 class="category text-gray div-inline"><?= $context->user->date_de_naissance->format( "d-m-Y" ); ?></h6>

					<h4 class="card-title"><?= ucfirst( $context->user->prenom ) ?> <?= ucfirst( $context->user->nom ) ?></h4>

					<?php if ( $context->edit ): ?>
						<form method="post" action="<?= $context->link('updateStatus'); ?>">
							<div class="content">

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">face</i>
									</span>
									<div class="form-group form-info label-floating is-focused">
										<label class="control-label">Status</label>
										<input type="text" name="status" placeholder=""
										       value="<?= $context->user->statut ?>" class="form-control">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="footer">
								<input type="submit" class="btn btn-info btn-round" value="Edit"/>
							</div>
						</form>
					<?php else: ?>
                        <?php if ($context->user->statut):?>
                            <i class="material-icons left">face</i>
                            <span class="card-description text-info">
                                <?= $context->user->statut ?>
                            </span>
                        <?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="col-md-8">

			<div class="card">
				<div class="content">
					<h3 class="category text-info">
						<i class="material-icons">create</i>
						To post a message
					</h3>

					<form method="post" enctype="multipart/form-data" action="<?= $context->link("postMessage") ?>">

						<input type="hidden" name="destinataire" value="<?= $context->user->id ?>">

						<div class="form-group form-info is-empty">
							<textarea name="message" class="form-control" placeholder="Write something here..." rows="6"></textarea>
							<span class="material-input"></span>
						</div>

						<div class="row">
							<div class="form-group">

								<div class="fileinput text-center fileinput-new pull-left" data-provides="fileinput">
									<div class="fileinput-preview fileinput-exists thumbnail img-raised" style="max-width: 50%;"></div>
									<div>

										<button type="button" rel="tooltip" class="btn btn-info" data-original-title="Select an image" data-placement="bottom" title="">
											<i class="material-icons">add_a_photo</i>
											<div class="ripple-container"></div>
											<span class="fileinput-exists">Edit</span>
											<input type="hidden" value="" name="picture">
											<input type="file" name="file" accept="image/*">
											<div class="ripple-container"></div>
										</button>

										<a class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Delete<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 43.5625px; top: 8.40625px; background-color: rgb(255, 255, 255); transform: scale(15.625);"></div></div></a>
									</div>
								</div>

							</div>
						</div>

						<div class="row">
							<input type="submit" class="btn btn-info pull-right" value="Post"/>
						</div>

					</form>
				</div>
			</div>


			<?php foreach ( $context->messages as $message ) :

                if ( isset($message->destinataire->prenom) && isset($message->destinataire->nom) ) {
            ?>
                <div class="card">
                    <div class="content">
                        <div class="author">
                        <?php
                            if ( ($message->emetteur->id) == ($message->destinataire->id) ) {
                        ?>
                                <a href="<?= $context->link( 'showProfile&id=' . $message->emetteur->id ) ?>">
                                    <?php if(!empty($message->emetteur->avatar)): ?>
                                        <img class="avatar img-rounded" src="<?= $message->emetteur->avatar; ?>">
                                    <?php else: ?>
                                        <img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
                                    <?php endif; ?>
                                    <span class="text-bold">
                                        <?= ucfirst( $message->emetteur->prenom ) ?> <?= ucfirst( $message->emetteur->nom ) ?>
                                    </span>
                                </a>
                                <span class="text-gray"> has published on his wall.</span>
                        <?php
                            } else {
                                ?>
                                <a href="<?= $context->link( 'showProfile&id=' . $message->emetteur->id ) ?>">
                                    <?php if(!empty($message->emetteur->avatar)): ?>
                                        <img class="avatar img-rounded" src="<?= $message->emetteur->avatar; ?>">
                                    <?php else: ?>
                                        <img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
                                    <?php endif; ?>
                                    <span class="text-bold">
                                <?= ucfirst( $message->emetteur->prenom ) ?> <?= ucfirst( $message->emetteur->nom ) ?>
                            </span>
                                </a>
                                <i class="material-icons icon-min">play_arrow</i>
                                <a href="<?= $context->link( 'showProfile&id=' . $message->destinataire->id ) ?>">
                            <span class="text-bold">
                                <?= ucfirst( $message->destinataire->prenom ) ?> <?= ucfirst( $message->destinataire->nom ) ?>
                            </span>
                                </a>
                                <?php
                            }
                        ?>
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
                            <button id="like_<?=$message->id?>" type="button" class="btn btn-default button-action">
                                <?php if( !isset($message->aime) || $message->aime == null ) {$message->aime = 0;} ?>
                                <label class="label-btn-action"><span class="badge"><?=$message->aime?></span>Like</label>
                                <i class="material-icons icon-like">thumb_up</i>
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

                        <span class="content content-date">Posted on <?= $message->post->date->format('j F \a\t g:i a'); ?></span>
                    </div>
                </div>
			<?php }
            endforeach; ?>
		</div>

	</div>
</div>