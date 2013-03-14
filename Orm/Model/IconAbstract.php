<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class IconAbstract extends ModelAbstract
{

    private $id = null;

    private $path = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function tableName()
    {
        return 'icon';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "path" => $this->getPath()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "path" => $this->getPath()
        );
    }


}
