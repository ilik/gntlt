<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class SpecialtyFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\Specialty";
public static $tableName = "specialty";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getBySpecialityCategoryId($specialityCategoryId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('specialityCategoryId', $specialityCategoryId)
        			->fetchOne();
    }

    public function getByCode($code)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('code', $code)
        			->fetchAll();
    }

    public function getByPrefix($prefix)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('prefix', $prefix)
        			->fetchAll();
    }

    public function getByTitle($title)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('title', $title)
        			->fetchAll();
    }

    public function getByQualification($qualification)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('qualification', $qualification)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
