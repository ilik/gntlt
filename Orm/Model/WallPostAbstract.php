<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\User\UserFinder;
use Orm\Finder\Wall\WallFinder;

class WallPostAbstract extends ModelAbstract
{

    private $id = null;

    private $userId = null;

    private $user = null;

    private $wallId = null;

    private $wall = null;

    private $postText = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUser()
    {
        return \Yii::app()->orm->getOrm()->getUserFinder()->getById($this->getUserId());
    }

    public function getWallId()
    {
        return $this->wallId;
    }

    public function setWallId($wallId)
    {
        $this->wallId = $wallId;
        return $this;
    }

    public function getWall()
    {
        return \Yii::app()->orm->getOrm()->getWallFinder()->getById($this->getWallId());
    }

    public function getPostText()
    {
        return $this->postText;
    }

    public function setPostText($postText)
    {
        $this->postText = $postText;
        return $this;
    }

    public function tableName()
    {
        return 'wallpost';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "userId" => $this->getUserId(),
        "wallId" => $this->getWallId(),
        "postText" => $this->getPostText()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "user" => $this->getUser()->asArray(),
        "wall" => $this->getWall()->asArray(),
        "postText" => $this->getPostText()
        );
    }


}
