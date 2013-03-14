<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class AudioExternalFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\AudioExternal";
public static $tableName = "audioExternal";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByKey($key)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('key', $key)
        			->fetchAll();
    }

    public function getByFilePath($filePath)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('filePath', $filePath)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
