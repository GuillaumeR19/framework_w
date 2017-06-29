<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ChatModel;
use \W\Model\UsersModel;

class ChatController extends Controller
{
    // affichage du chat et du formulaire permettant d'envoyer un message 
    public function chat()
    {
        $errors = [];
        $formValid = false;
        $params = [
            // dans la vue, les clés deviennent des variables
            'formValid' => $formValid,
            'errors' => $errors,
        ];

        // Affichage du chat seulement si connecté
        if(!empty($this->getUser())){
            $this->show('chat/chat', $params);
        }
        else{{
            $this->showNotFound(); // sinon page 404
        }}

    }

    // Valider un message et l'insérer en base de données
    public function addMessageAjax()
    {
        $post = [];
        $errors = [];
        $current_user = $this->getUser();


        if(!empty($_POST)){
            foreach($_POST as $key =>$value){
                $post[$key] = trim(strip_tags($value));
            }
            if(empty($current_user)){
                $errors[] = 'Vous devez être connecté pour publier un message';
            }

            if(!empty($post['message'] && ($post['message'] > 500))){
                $errors[] = 'Message non conforme ! il faut moins de 500 caractères';
            }

            if(count($errors) === 0){
                $authModel = new \W\Security\AuthentificationModel; 
                $userLog = $authModel->getLoggedUser();
                $datas = [
                    'message' => $post['message'], 
                    'date_publish' => date('d-m-Y H:i:s'), // date('c') raccourci de mysql pour dire la meme chose
                    'id_user' => $userLog,
                ];

                $chatModel = new ChatModel;
                $insert = $chatModel->insert($datas); // retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

                if(!empty($insert)){
                    $json = [
                        'result' => true,
                    ];
                }
                else{
                    $json = [
                        'result' => false,
                        'errors' => 'Une erreur est survenue !',
                    ];
                }
                // Si on oublie pas de transmettre tout ça dans la méthode show()


            } // Count ($errors)
            else{
                $json = [
                    'result' => false,
                    'errors' => implode('<br>', $errors),
                ];
            }
            $this->showJson($json);
        }   
    }

    //Récupération de tous les messages existants en base
    public function listMessagesAjax()
    {
        $chatModel = new ChatModel();
        $messages = $chatModel->findAllWithAuthors('date_publish', 'DESC'); 

        $html = '<ul>';
        foreach($messages as $msg){
            $html.= '<li><strong>'.$msg['firstname'].'<strong>('.$msg['date_publish'].')<p>'.$msg['message'].'</p>';
        }
        $html.='</ul>';    
        
        // On renvoie une grande et longue chaîne de caractères
        $this->showJson($html);
    }
}