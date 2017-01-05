<div class="card">
	<div class="content">
		<div class="author">
			<?php if(isset($message->emetteur) && $message->emetteur->id != null): ?>
			<a href="<?= $context->link( 'showProfile&id=' . $message->emetteur->id ) ?>">
				<?php if(isset($message->emetteur->avatar) && !empty($message->emetteur->avatar)): ?>
					<img class="avatar img-rounded" src="<?= $message->emetteur->avatar; ?>">
				<?php else: ?>
					<img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
				<?php endif; ?>
				<span class="text-bold">
					<?= ucfirst( $message->emetteur->prenom ) ?> <?= ucfirst( $message->emetteur->nom ) ?>
				</span>
			</a>
			<?php else: ?>
				<a href="">
					<img class="avatar img-rounded" src="<?= IMG . DS . AVATAR; ?>">
					<span class="text-bold">Unknown</span>
				</a>
			<?php endif; ?>
			<i class="material-icons icon-min">play_arrow</i>
			<?php if(isset($message->destinataire) && $message->destinataire->id != null): ?>
				<a href="<?= $context->link( 'showProfile&id=' . $message->destinataire->id ) ?>">
					<span class="text-bold">
						<?= ucfirst( $message->destinataire->prenom ) ?> <?= ucfirst( $message->destinataire->nom ) ?>
					</span>
				</a>
			<?php else: ?>
				<a href="">
					<span class="text-bold">Unknown</span>
				</a>
			<?php endif; ?>
		</div>
		<div class="card-description">
			<?php if(!isset($message->post->texte) || !$message->post->texte): ?>
				<h4>Aucun message.</h4>
			<?php else: ?>
				<h3 class="card-text"><?= $message->post->texte; ?></h3>
			<?php endif; ?>
			<?php if(isset($message->post->image) && $message->post->image): ?>
				<div class="image-container" style="margin: 15px 0;">
					<img src="<?= $message->post->image; ?>" alt="" class="img-rounded img-responsive">
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
