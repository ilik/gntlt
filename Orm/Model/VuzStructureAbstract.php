<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Vuz\VuzFinder;
use Orm\Finder\VuzStructure\VuzStructureFinder;
use Orm\Finder\Details\DetailsFinder;

class VuzStructureAbstract extends ModelAbstract
{

    private $id = null;

    private $vuzId = null;

    private $vuz = null;

    private $vuzStructureId = null;

    private $vuzStructure = null;

    private $tableId = null;

    private $itemId = null;

    private $itemTitle = null;

    private $detailsId = null;

    private $details = null;

    private $isParent = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getVuzId()
    {
        return $this->vuzId;
    }

    public function setVuzId($vuzId)
    {
        $this->vuzId = $vuzId;
        return $this;
    }

    public function getVuz()
    {
        return \Yii::app()->orm->getOrm()->getVuzFinder()->getById($this->getVuzId());
    }

    public function getVuzStructureId()
    {
        return $this->vuzStructureId;
    }

    public function setVuzStructureId($vuzStructureId)
    {
        $this->vuzStructureId = $vuzStructureId;
        return $this;
    }

    public function getVuzStructure()
    {
        return \Yii::app()->orm->getOrm()->getVuzStructureFinder()->getByVuzStructureId($this->getId());
    }

    public function getTableId()
    {
        return $this->tableId;
    }

    public function setTableId($tableId)
    {
        $this->tableId = $tableId;
        return $this;
    }

    public function getItemId()
    {
        return $this->itemId;
    }

    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
        return $this;
    }

    public function getItemTitle()
    {
        return $this->itemTitle;
    }

    public function setItemTitle($itemTitle)
    {
        $this->itemTitle = $itemTitle;
        return $this;
    }

    public function getDetailsId()
    {
        return $this->detailsId;
    }

    public function setDetailsId($detailsId)
    {
        $this->detailsId = $detailsId;
        return $this;
    }

    public function getDetails()
    {
        return \Yii::app()->orm->getOrm()->getDetailsFinder()->getById($this->getDetailsId());
    }

    public function getIsParent()
    {
        return $this->isParent;
    }

    public function setIsParent($isParent)
    {
        $this->isParent = $isParent;
        return $this;
    }

    public function tableName()
    {
        return 'vuzstructure';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "vuzId" => $this->getVuzId(),
        "vuzStructureId" => $this->getVuzStructureId(),
        "tableId" => $this->getTableId(),
        "itemId" => $this->getItemId(),
        "itemTitle" => $this->getItemTitle(),
        "detailsId" => $this->getDetailsId(),
        "isParent" => $this->getIsParent()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "vuz" => $this->getVuz()->asArray(),
        "vuzStructure" => $this->getVuzStructure()->asArray(),
        "tableId" => $this->getTableId(),
        "itemId" => $this->getItemId(),
        "itemTitle" => $this->getItemTitle(),
        "details" => $this->getDetails()->asArray(),
        "isParent" => $this->getIsParent()
        );
    }


}
