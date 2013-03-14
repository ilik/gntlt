<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class DepartmentAbstract extends ModelAbstract
{

    private $id = null;

    private $name = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function tableName()
    {
        return 'department';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "name" => $this->getName()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "name" => $this->getName()
        );
    }


}
