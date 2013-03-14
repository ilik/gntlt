<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class FileFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\File";
public static $tableName = "file";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByUrl($url)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('url', $url)
        			->fetchAll();
    }

    public function getByName($name)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('name', $name)
        			->fetchAll();
    }

    public function getByExt($ext)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('ext', $ext)
        			->fetchAll();
    }

    public function getBySize($size)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('size', $size)
        			->fetchAll();
    }

    public function getByCreated($created)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('created', $created)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
