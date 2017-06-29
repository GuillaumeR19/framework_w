<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;

class UsersController extends Controller
{
    public function connexion()
    {
        $post = [];
        $errors = [];
        $formValid = false;

        if(!empty($_POST)){
            foreach($_POST as $key =>$value){
                $post[$key] = trim(strip_tags($value));
            }
            if(strlen($post['username']) < 2){
                $errors[] = 'le nom doit comporter au moins 2 caractères';
            }
            if(strlen($post['password']) < 6){
                $errors[] = 'le mot de passe doit comporter au moins 6 caractères';
            }
            if(count($errors) === 0){
                
                $authModel = new \W\Security\AuthentificationModel;
                $verif = $authModel->IsValidLoginInfo($post['username'], $post['password']);

                if($verif != 0){
                    $formValid = true;
                }
                $authModel->logUserIn($verif);
                $UserLog = $authModel->getLoggedUser();
            }
        }    
        $params = [
            // dans la vue, les clés deviennent des variables
            'formValid' => $formValid,
            'errors' => $errors,
            'UserLog' => $UserLog,
        ];
        // Si on oublie pas de transmettre tout ça dans la méthode show()
        $this->show('users/connexion', $params);
    }
   
}