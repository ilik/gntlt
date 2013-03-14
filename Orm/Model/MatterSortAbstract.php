<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\MatterType\MatterTypeFinder;

class MatterSortAbstract extends ModelAbstract
{

    private $id = null;

    private $matterTypeId = null;

    private $matterType = null;

    private $title = null;

    private $icon = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getMatterTypeId()
    {
        return $this->matterTypeId;
    }

    public function setMatterTypeId($matterTypeId)
    {
        $this->matterTypeId = $matterTypeId;
        return $this;
    }

    public function getMatterType()
    {
        return \Yii::app()->orm->getOrm()->getMatterTypeFinder()->getById($this->getMatterTypeId());
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

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function tableName()
    {
        return 'mattersort';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "matterTypeId" => $this->getMatterTypeId(),
        "title" => $this->getTitle(),
        "icon" => $this->getIcon()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "matterType" => $this->getMatterType()->asArray(),
        "title" => $this->getTitle(),
        "icon" => $this->getIcon()
        );
    }


}
