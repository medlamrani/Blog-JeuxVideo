<?php 

namespace Project\lib\entity;

class CommentGame extends Entity
{
    protected $id,
              $gameId,
              $user,
              $content,
              $report,
              $commentDate;

    
    public function isValid()
    {
        return !(empty($this->content));
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setGameId($gameId)
    {
        $this->gameId = (int) $gameId;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setReport($report)
    {
        $this->report = $report;
    }

    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function getUser()
    {
        return $this->user;
    }
    
    public function getContent()
    {
        return $this->content;
    }

    public function getReport()
    {
        return $this->report;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }
}