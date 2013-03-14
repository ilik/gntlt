<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class WallFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Wall";
public static $tableName = "wall";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByUserId($userId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('userId', $userId)
        			->fetchOne();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getBySettingId($settingId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('settingId', $settingId)
        			->fetchOne();
    }

    public function getBuilder()
    {
        return $this;
    }


}
