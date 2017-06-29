<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
        ['GET', '/page2', 'Default#page2', 'default_page2'],
        ['GET|POST', '/formulaire', 'Default#formulaire', 'default_formulaire'],
        
        ['GET', '/list', 'Default#u_list', 'users_list'],
        ['GET|POST', '/users/connexion', 'Users#connexion', 'users_connexion'],
        
        ['GET|POST', '/article/addArticle', 'Article#addArticle', 'article_addArticle'],
        ['GET', '/article/listArticle', 'Article#listArticle', 'article_listArticle'],
        ['GET', '/article/viewArticle', 'Article#viewArticle', 'article_viewArticle'],
        
        ['GET|POST', '/chat', 'Chat#chat', 'chat_chat'],
        ['GET|POST', '/chatAdd', 'Chat#addMessageAjax', 'chat_chatAdd'],
        ['GET|POST', '/chatList', 'Chat#listMessagesAjax', 'chat_chatList'],
    );

// dans un fichier vue, permet de créer un lien vers /page2
// $this->url('default_firstPage');

/** 
    Default#firstPage
    Dans DefaultController cherche la méthode firstPage()
    */