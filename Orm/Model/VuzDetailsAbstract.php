<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class VuzDetailsAbstract extends ModelAbstract
{

    private $id = null;

    private $description = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function tableName()
    {
        return 'vuzdetails';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "description" => $this->getDescription()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "description" => $this->getDescription()
        );
    }


}
