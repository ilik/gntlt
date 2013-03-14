<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class MatterTypeSortAbstract extends ModelAbstract
{

    private $id = null;

    private $typeId = null;

    private $sortId = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTypeId()
    {
        return $this->typeId;
    }

    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getSortId()
    {
        return $this->sortId;
    }

    public function setSortId($sortId)
    {
        $this->sortId = $sortId;
        return $this;
    }

    public function tableName()
    {
        return 'mattertypesort';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "typeId" => $this->getTypeId(),
        "sortId" => $this->getSortId()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "typeId" => $this->getTypeId(),
        "sortId" => $this->getSortId()
        );
    }


}
