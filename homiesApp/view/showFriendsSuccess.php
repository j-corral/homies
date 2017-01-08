<div class="container">
	<div class="row">
		<div class="cd-section">
			<div class="row">
				<div class="tim-typo">
					<h2 class="title">Friends list</h2>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="row">

				<?php foreach ( $context->users as $user ): ?>

					<div class="col-xs-12 col-md-6 col-lg-4 card-full">

						<div class="card card-profile card-friend-list">

							<div class="card-avatar card-avatar-list">
								<a href="<?= $context->link( 'showProfile&id=' . $user->id ) ?>">
									<?php if ( $user->avatar ): ?>
										<img class="img-rounded img-responsive"
										     style="background-image: url('<?= $user->avatar; ?>')">
									<?php else: ?>
										<img class="img-rounded img-responsive"
										     style="background-image: url('<?= $context->avatar; ?>')">
									<?php endif; ?>
								</a>
							</div>

							<div class="content">
								<i class="material-icons">cake</i>
								<h6 class="category text-gray div-inline"><?= $user->date_de_naissance->format( "d-m-Y" ); ?></h6>

								<h4 class="card-title"><?= ucfirst( $user->prenom ) ?> <?= ucfirst( $user->nom ) ?></h4>

								<p class="card-description">
									<?php if ( $user->statut ): ?>
										<i class="material-icons left">face</i>
										<span class="card-description text-info">
                                <?= $user->statut ?>
                            </span>
									<?php endif; ?>
								</p>
								<a href="<?= $context->link( 'showProfile&id=' . $user->id ) ?>"
								   class="btn btn-info btn-round">Show</a>
							</div>
						</div>
					</div>


				<?php endforeach; ?>

			</div>
		</div>

	</div>
</div>
