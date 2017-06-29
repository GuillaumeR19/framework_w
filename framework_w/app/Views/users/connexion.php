<?php $this->layout('layout', ['title' => 'Connexion']) ?>
<?php session_start(); ?>
<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint la connexion. Bravo.</p>
<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<hr>
<a href="listArticle">Consulter les articles</a>
<a href="../users/connexion?deco=1">Déconnexion</a>
<a href="../chat">Accès Chat</a>
<hr>

<?php
    if(!empty($formErrors)){
        echo '<p style="color:red";>'.implode('<br>', $formErrors);
    }
    if($formValid == true){
        echo '<p style="color:green";>Vous êtes désormais connecté</p>';
    }
 ?>
<form style="text-align:center;" method="POST">
    <input type="text" placeholder="username" name="username"><br>
    <input type="text" placeholder="password" name="password"><br>
    <button type="submit">Envoyer</button>
</form>

<?php echo $UserLog; ?>


<?php $this->stop('main_content') ?>