<?php $this->layout('layout', ['title' => 'Page 2']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page 2. Bravo.</p>
	<p>Salut tout le monde !</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
	<?php echo $firstname.' '.$lastname.' <br>'.$email; ?>

<?php $this->stop('main_content') ?>