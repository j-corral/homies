
<h4>Messages</h4>

<?php foreach ($context->messages as $message): ?>
<div>
	<p>Message du user: <?= $message->emetteur->prenom; ?> <?= $message->emetteur->nom; ?> <?= $message->id; ?> <?= $message->post->date->format("d-m-Y"); ?></p>
	<p>--> <?= $message->post->texte; ?> ecrit par <?= $message->emetteur->prenom; ?> <?= $message->emetteur->nom; ?> à destination de <?= $message->destinataire->prenom; ?> <?= $message->destinataire->nom; ?> (le parent étant : <?= $message->parent->id; ?>)</p>
</div>
	<hr>
<?php endforeach; ?>
