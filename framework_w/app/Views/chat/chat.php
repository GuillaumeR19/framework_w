<?php $this->layout('layout', ['title' => 'Chat']) ?>


<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint le chat. Bravo.</p>
<p>Et maintenant, DEMERDE TOI !</a></strong></p>

<hr>
<a href="listArticle">Consulter les articles</a> ||
<a href="../users/connexion?deco=1">Déconnexion</a> ||
<hr>


<div id="showMessages"></div>
<form style="text-align:center;" method="POST">
<div id="errorAjax"></div>
    <textarea id="message" type="text" placeholder="message" name="message"></textarea><br>
    <button type="submit" id="submit">Envoyer</button>
</form>


<?php $this->stop('main_content') ?>
<?php $this->start('js') ?>
<script>
function getMessages(){
	$.getJSON('<?=$this->url('chat_chatList');?>', function(htmlMessages){
		$('#showMessages').html(htmlMessages);
	});
}

$(document).ready(function(){
	
	getMessages(); // Au chargement de la page

	$('#submit').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: '<?=$this->url('chat_chatAdd');?>',
			type: 'post',
			dataType: 'json',
			data: {message: $('#message').val()},
			success: function(retourJson){

				if(retourJson.result == true){
					getMessages(); // On recupere les messages pour afficher le nouveau message
                    
					$('#message').val(''); // On va vider le champ après l'envoi du message 

				}
				else if(retour.result == false){
					$('#errorAjax').html(retourJson.errors);
				}
			},
		});
	});

});
</script>
<?php $this->stop('js') ?>