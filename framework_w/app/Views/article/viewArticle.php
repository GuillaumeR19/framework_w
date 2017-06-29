<?php $this->layout('layout', ['title' => 'Article']) ?>
<?php session_start(); ?>

<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint la page d'article. Bravo.</p>
<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php
    
if(isset($_SESSION['username'], ['id'])){

?>

<hr>
<a href="addArticle">Ajouter un article</a>
<a href="listArticle">Consulter les articles</a>
<a href="">Déconnexion</a>
<hr>

  <?php 
		if(isset($error)){
			echo '<p style="color:red;">'.$error.'</p>';
		}
		else {


			echo '<h2><strong>Titre :</strong> '.$articleView['title'].'</h2>';
			echo '<p><strong>Auteur :</strong> '.$author['username'].'</p>';
			echo '<p><em>Date :</em> '.$articleView['date_publi'].'</p>';
            echo '<p>Contenu : '.$articleView['content'].' </p>';
			
		}
	
}  
?>

<?php $this->stop('main_content') ?>