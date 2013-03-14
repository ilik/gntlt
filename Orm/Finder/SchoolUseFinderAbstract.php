<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class SchoolUseFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\SchoolUse";
public static $tableName = "schoolUse";
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

    public function getByMySchoolId($mySchoolId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('mySchoolId', $mySchoolId)
        			->fetchOne();
    }

    public function getBySchoolId($schoolId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('schoolId', $schoolId)
        			->fetchOne();
    }

    public function getBySchoolSubjectId($schoolSubjectId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('schoolSubjectId', $schoolSubjectId)
        			->fetchOne();
    }

    public function getByScore($score)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('score', $score)
        			->fetchAll();
    }

    public function getByDate($date)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('date', $date)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
