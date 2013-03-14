<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\BrancheType\BrancheTypeFinder;

class BranchesAbstract extends ModelAbstract
{

    private $id = null;

    private $brancheTypeId = null;

    private $brancheType = null;

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

    public function getBrancheTypeId()
    {
        return $this->brancheTypeId;
    }

    public function setBrancheTypeId($brancheTypeId)
    {
        $this->brancheTypeId = $brancheTypeId;
        return $this;
    }

    public function getBrancheType()
    {
        return \Yii::app()->orm->getOrm()->getBrancheTypeFinder()->getById($this->getBrancheTypeId());
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
        return 'branches';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "brancheTypeId" => $this->getBrancheTypeId(),
        "title" => $this->getTitle(),
        "icon" => $this->getIcon()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "brancheType" => $this->getBrancheType()->asArray(),
        "title" => $this->getTitle(),
        "icon" => $this->getIcon()
        );
    }


}
