<?php
namespace Orm\Finder;

use Orm\FinderAbstract;

class VuzSpecialityFinderAbstract extends FinderAbstract
{

public static $modelName = "Orm\\Model\\VuzSpeciality";
public static $tableName = "vuzSpeciality";
public static $_instance;
    public function __construct($modelName, $with)
    {
        parent::__construct(new static::$modelName(), array());
    }

    public function getByVuzId($vuzId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzId', $vuzId)
        			->fetchOne();
    }

    public function getByVuzStructureId($vuzStructureId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('vuzStructureId', $vuzStructureId)
        			->fetchOne();
    }

    public function getBySpecialityCategoryId($specialityCategoryId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('specialityCategoryId', $specialityCategoryId)
        			->fetchOne();
    }

    public function getBySpecialityId($specialityId)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('specialityId', $specialityId)
        			->fetchOne();
    }

    public function getByLevel($level)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('level', $level)
        			->fetchAll();
    }

    public function getByFormTraining($formTraining)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('formTraining', $formTraining)
        			->fetchAll();
    }

    public function getByDepartment($department)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('department', $department)
        			->fetchAll();
    }

    public function getByPeriodTraining($periodTraining)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('periodTraining', $periodTraining)
        			->fetchAll();
    }

    public function getBySeats($seats)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('seats', $seats)
        			->fetchAll();
    }

    public function getByCost($cost)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('cost', $cost)
        			->fetchAll();
    }

    public function getByStartDocuments($startDocuments)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('startDocuments', $startDocuments)
        			->fetchAll();
    }

    public function getByStopDocuments($stopDocuments)
    {
        return $this->getBuilder()
        			->select('*')
        			->eq('stopDocuments', $stopDocuments)
        			->fetchAll();
    }

    public function getBuilder()
    {
        return $this;
    }


}
