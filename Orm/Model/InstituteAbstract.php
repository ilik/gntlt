<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class InstituteAbstract extends ModelAbstract
{

    private $id = null;

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
        return 'institute';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "title" => $this->getTitle()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "title" => $this->getTitle()
        );
    }


}
