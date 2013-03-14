<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class SpecialtyCategoryAbstract extends ModelAbstract
{

    private $id = null;

    private $code = null;

    private $title = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
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

    public function tableName()
    {
        return 'specialtycategory';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "code" => $this->getCode(),
        "title" => $this->getTitle()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "code" => $this->getCode(),
        "title" => $this->getTitle()
        );
    }


}
