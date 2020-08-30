<?php 

namespace Project\lib\model;

use  Project\lib\model;

class NewsManager extends DBConnect
{
    public function addNews(News $news)
    {
        // ajouter une news
        $sql = "INSERT INTO news(user_id, title, content, addDate, updateDate)
        VALUES(:user_id, :title, :content, NOW(), NOW())";
        $db = $this->connect()->prepare($sql);

        $db->bindValue(':title', $news->title());
        $db->bindValue(':user_id', $news->userId());
        $db->bindValue(':content', $news->content());

        $db->execute();

        $_SESSION['message'] = 'Article ajoute avec succes !'; 
    }

    public function deleteNews($id)
    {
        // supprimer une news
        $sql = "DELETE FROM news WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'L\'article a ete supprime avec succes !'; 
    }

    public function updateNews(News $news)
    {
        // Modifier une news
        $sql = "UPDATE news SET user_id = :user_id, title = :title, content = :content, updateDate = NOW() WHERE id = :id";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':title', $news->title());
        $req->bindValue(':user_id', $news->userId());
        $req->bindValue(':content', $news->content());
        $req->bindValue(':id', $news->id(), PDO::PARAM_INT);

        $req->execute();

        $_SESSION['message'] = 'Article modifier avec succes !'; 
    }

    public function listOfNews($debut = -1, $limite = -1)
    {
        // Liste des news
        $sql = 'SELECT id, user_id, title, content, addDate, updateDate FROM news ORDER BY id DESC';

        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT ' . (int) $limite. ' OFFSET '. (int) $debut;
        }

        $req = $this->connect()->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

        $listNews = $req->fetchAll();

        foreach ($listNews as $news)
        {
            $news->setAddDate(new DateTime($news->addDate()));
            $news->setUpdateDate(new DateTime($news->updateDate()));
        }

        $req->closeCursor();

        return $listNews;
    }

    public function news($id)
    {
        //afficher une seul news
        $sql = "SELECT id, user_id, title, content, addDate, updateDate FROM news WHERE id = :id";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

        $news = $req->fetch();

        $news->setAddDate(new DateTime($news->addDate()));
        $news->setUpdateDate(new DateTime($news->updateDate()));

        return $news;
    }
}