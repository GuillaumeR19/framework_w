<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;

class ArticleController extends Controller
{
    public function addArticle()
    {
        $post = [];
        $errors = [];
        $formValid = false;

        if(!empty($_POST)){
            foreach($_POST as $key =>$value){
                $post[$key] = trim(strip_tags($value));
            }
            if(strlen($post['title']) < 5){
                $errors[] = 'le titre doit comporter au moins 5 caractères';
            }
            if(strlen($post['content']) >= 1000){
                $errors[] = 'le contenu doit comporter au maximum 1000 caractères';
            }            
            if(count($errors) === 0){

                $datas = [
                    'title' => $post['title'],
                    'idUsers'=> $post['idUsers'],
                    'date_publi' => date('d-m-Y'),
                    'content' => $post['content'],   
                ];

                $articleModel = new ArticleModel();
                $insert = $articleModel->insert($datas); // retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

                if(!empty($insert)){
                    $formValid = true;
                }
            }
        }    
        $params = [
            // dans la vue, les clés deviennent des variables
            'formValid' => $formValid,
            'errors' => $errors,
        ];


        // Si on oublie pas de transmettre tout ça dans la méthode show()
        $this->show('article/addArticle', $params);
    }
    
    public function listArticle()
    {
        $articleModel = new ArticleModel();
        $articleList = $articleModel->findAll(); 
        $params = [
            'articleList' => $articleList,
        ];
        
        $this->show('article/listArticle', $params);
    }
    
    public function viewArticle()
    {
    
        $articleModel = new ArticleModel();
        $articleView = $articleModel->find((int) $_GET['id']); 
        $author = $articleModel->nameUser((int) $_GET['id']);
        
        $params = [
           'articleView' => $articleView,
            'author' => $author
        ];
        
        $this->show('article/viewArticle', $params);
    }
    
}