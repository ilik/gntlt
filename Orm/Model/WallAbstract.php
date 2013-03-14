<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\User\UserFinder;
use Orm\Finder\Setting\SettingFinder;

class WallAbstract extends ModelAbstract
{

    private $id = null;

    private $userId = null;

    private $user = null;

    private $title = null;

    private $settingId = null;

    private $setting = null;

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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getSettingId()
    {
        return $this->settingId;
    }

    public function setSettingId($settingId)
    {
        $this->settingId = $settingId;
        return $this;
    }

    public function getSetting()
    {
        return \Yii::app()->orm->getOrm()->getSettingFinder()->getById($this->getSettingId());
    }

    public function tableName()
    {
        return 'wall';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "userId" => $this->getUserId(),
        "title" => $this->getTitle(),
        "settingId" => $this->getSettingId()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "user" => $this->getUser()->asArray(),
        "title" => $this->getTitle(),
        "setting" => $this->getSetting()->asArray()
        );
    }


}
