<?php
namespace Orm\Model;

use Orm\ModelAbstract;

class PhotoExternalAbstract extends ModelAbstract
{

    private $key = null;

    private $filePath = null;

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
        return $this;
    }

    public function tableName()
    {
        return 'photoexternal';
    }

    public function asArray()
    {
        return array(
        "key" => $this->getKey(),
        "filePath" => $this->getFilePath()
        );
    }

    public function asArrayFull()
    {
        return array(
        "key" => $this->getKey(),
        "filePath" => $this->getFilePath()
        );
    }


}
