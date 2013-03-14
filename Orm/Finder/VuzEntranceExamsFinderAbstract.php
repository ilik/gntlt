<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class VuzEntranceExamsFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\VuzEntranceExams";
public static $tableName = "vuzEntranceExams";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByVuzSpecialityId($vuzSpecialityId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzSpecialityId', $vuzSpecialityId)
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
