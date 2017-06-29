<?php $this->layout('layout', ['title' => 'Ajout d\'article']) ?>
<?php session_start(); ?>

<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint l'ajout d'article. Bravo.</p>
<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<hr>
<a href="listArticle">Consulter les articles</a>
<a href="../users/connexion?deco=1">Déconnexion</a>
<hr>
<?php
    if(!empty($formErrors)){
        echo '<p style="color:red";>'.implode('<br>', $formErrors);
    }
    if($formValid == true){
        echo '<p style="color:green";>L\'article a bien été enregistré</p>';
    }
    ?>
    
<form style="text-align:center;" method="POST">
    <input type="text" placeholder="title" name="title"><br>
    <input type="text" placeholder="idUsers" name="idUsers"><br>
    <input type="text" placeholder="date_publi" name="date_publi"><br>
    <textarea type="text" placeholder="content" name="content"></textarea><br>
    <button type="submit">Envoyer</button>
</form>



<?php $this->stop('main_content') ?>