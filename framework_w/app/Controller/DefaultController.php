<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;

class DefaultController extends Controller
{

    /**
	 * Page d'accueil par défaut
	 */
    public function home()
    {
        $this->show('default/home');
    }

    public function page2()
    {
        $firstname = 'Guillaume';
        $lastname = 'Rougé';
        $email = 'g.rouge19@gmail.com';
        $params = [ // la clé sera le nom de la variable dans la vue
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email
        ];
        $this->show('default/page2', $params);
    }

    public function formulaire()
    {
        $post = [];
        $errors = [];
        $formValid = false;
        $rolesAvailable = ['Admin', 'User', 'Editor'];

        if(!empty($_POST)){
            foreach($_POST as $key =>$value){
                $post[$key] = trim(strip_tags($value));
            }
            if(strlen($post['firstname']) < 2){
                $errors[] = 'le prénom doit comporter au moins 2 caractères';
            }
            if(strlen($post['lastname']) < 2){
                $errors[] = 'le nom doit comporter au moins 2 caractères';
            }
            if(strlen($post['username']) < 2){
                $errors[] = 'le nom doit comporter au moins 2 caractères';
            }
            if(strlen($post['password']) < 6){
                $errors[] = 'le mot de passe doit comporter au moins 6 caractères';
            }
            if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
                $errors[] = 'L\'adresse email est invalide';
            }
            if(!in_array($post['role'], $rolesAvailable)){
                $errors[] = 'Votre rôle est invalide';
            }

            if(count($errors) === 0){
                $authModel = new \W\Security\AuthentificationModel;
                $datas = [
                    'firstname' => $post['firstname'],
                    'lastname' => $post['lastname'],
                    'username' => $post['username'],
                    'email' => $post['email'],
                    'password' => $authModel->hashPassword($post['password']),
                    'role' => $post['role'],    
                ];
                
                $usersModel = new UsersModel();
                $insert = $usersModel->insert($datas); // retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                
                if(!empty($insert)){
                    $formValid = true;
                }
                
            }
        }   
        if(isset($_GET['deco'])){
            if($_GET['deco']='1'){
                authModel = new \W\Security\AuthentificationModel;
                $authModel->logUserOut();
                $deco=true;
            }
        }
        
        $params = [
            // dans la vue, les clés deviennent des variables
            'formValid' => $formValid,
            'errors' => $errors,
        ];
        // Si on oublie pas de transmettre tout ça dans la méthode show()
        $this->show('default/formulaire', $params);
    }
    
    public function u_list()
    {
        $usersModel = new UsersModel();
        $usersList = $usersModel->findAll(); 
        $params = [
            'usersList' => $usersList,
        ];
        
        $this->show('users/list', $params);
    }
}