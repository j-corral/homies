
<h4>Messages</h4>

<?php foreach ($context->messages as $message): ?>
<div>
	<p>Message du user: $message->nom; $message->prenom $message->identifiant $message->date</p>
	<p>--> $message->texte ecrit par $message->emetteur à destination de $message->destinataire (le parent étant : $message->parent)</p>
</div>
	<hr>
<?php endforeach; ?>
