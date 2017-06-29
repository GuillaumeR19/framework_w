<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ChatModel extends \W\Model\Model
{
    // Récupère les messages avec le nom des auteurs
    public function findAllWithAuthors()
    {
        // Le mot clé "AS" permet de renommer (temporairement, uniquement dans la requête) la table. Pour accéder uax colonnes, il faudra donc utiliser l'alias et non le nom de la table. "AS" n'est pas indispensable mais il est EST préférable de la mettre pour éviter les confusions et la lisibilité du code
        $sql = 'SELECT c.*, u.firstname FROM '. $this->table.' AS c INNER JOIN users AS u ON c.id_user =  u.id ORDER BY c.date_publish ASC';
        
        $select = $this->dbh->prepare($sql);
        if($select->execute()){
            return $select->fetchAll(); // renvoie les résultats
        }
        return false;
    }
}