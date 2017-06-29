<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ArticleModel extends \W\Model\Model
{
    
    public function nameUser($id)
    {
        $sql = 'SELECT username FROM users WHERE id = :id LIMIT 1';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
                
        return $sth->fetch();
    }

    
}