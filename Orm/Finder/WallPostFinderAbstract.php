<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class WallPostFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\WallPost";
public static $tableName = "wallPost";
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

    public function getByWallId($wallId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('wallId', $wallId)
        			->fetchOne();
    }

    public function getByPostText($postText)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('postText', $postText)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
