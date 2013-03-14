<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class FileAbstract extends ModelAbstract
{

    private $id = null;

    private $url = null;

    private $name = null;

    private $ext = null;

    private $size = null;

    private $created = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
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

    public function getExt()
    {
        return $this->ext;
    }

    public function setExt($ext)
    {
        $this->ext = $ext;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    public function tableName()
    {
        return 'file';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "url" => $this->getUrl(),
        "name" => $this->getName(),
        "ext" => $this->getExt(),
        "size" => $this->getSize(),
        "created" => $this->getCreated()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "url" => $this->getUrl(),
        "name" => $this->getName(),
        "ext" => $this->getExt(),
        "size" => $this->getSize(),
        "created" => $this->getCreated()
        );
    }


}
