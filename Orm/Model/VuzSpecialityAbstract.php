<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Vuz\VuzFinder;
use Orm\Finder\VuzStructure\VuzStructureFinder;
use Orm\Finder\SpecialityCategory\SpecialityCategoryFinder;
use Orm\Finder\Speciality\SpecialityFinder;

class VuzSpecialityAbstract extends ModelAbstract
{

    private $id = null;

    private $vuzId = null;

    private $vuz = null;

    private $vuzStructureId = null;

    private $vuzStructure = null;

    private $specialityCategoryId = null;

    private $specialityCategory = null;

    private $specialityId = null;

    private $speciality = null;

    private $level = null;

    private $formTraining = null;

    private $department = null;

    private $periodTraining = null;

    private $seats = null;

    private $cost = null;

    private $startDocuments = null;

    private $stopDocuments = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getVuzId()
    {
        return $this->vuzId;
    }

    public function setVuzId($vuzId)
    {
        $this->vuzId = $vuzId;
        return $this;
    }

    public function getVuz()
    {
        return \Yii::app()->orm->getOrm()->getVuzFinder()->getById($this->getVuzId());
    }

    public function getVuzStructureId()
    {
        return $this->vuzStructureId;
    }

    public function setVuzStructureId($vuzStructureId)
    {
        $this->vuzStructureId = $vuzStructureId;
        return $this;
    }

    public function getVuzStructure()
    {
        return \Yii::app()->orm->getOrm()->getVuzStructureFinder()->getById($this->getVuzStructureId());
    }

    public function getSpecialityCategoryId()
    {
        return $this->specialityCategoryId;
    }

    public function setSpecialityCategoryId($specialityCategoryId)
    {
        $this->specialityCategoryId = $specialityCategoryId;
        return $this;
    }

    public function getSpecialityCategory()
    {
        return \Yii::app()->orm->getOrm()->getSpecialityCategoryFinder()->getById($this->getSpecialityCategoryId());
    }

    public function getSpecialityId()
    {
        return $this->specialityId;
    }

    public function setSpecialityId($specialityId)
    {
        $this->specialityId = $specialityId;
        return $this;
    }

    public function getSpeciality()
    {
        return \Yii::app()->orm->getOrm()->getSpecialityFinder()->getById($this->getSpecialityId());
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    public function getFormTraining()
    {
        return $this->formTraining;
    }

    public function setFormTraining($formTraining)
    {
        $this->formTraining = $formTraining;
        return $this;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    public function getPeriodTraining()
    {
        return $this->periodTraining;
    }

    public function setPeriodTraining($periodTraining)
    {
        $this->periodTraining = $periodTraining;
        return $this;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;
        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    public function getStartDocuments()
    {
        return $this->startDocuments;
    }

    public function setStartDocuments($startDocuments)
    {
        $this->startDocuments = $startDocuments;
        return $this;
    }

    public function getStopDocuments()
    {
        return $this->stopDocuments;
    }

    public function setStopDocuments($stopDocuments)
    {
        $this->stopDocuments = $stopDocuments;
        return $this;
    }

    public function tableName()
    {
        return 'vuzspeciality';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "vuzId" => $this->getVuzId(),
        "vuzStructureId" => $this->getVuzStructureId(),
        "specialityCategoryId" => $this->getSpecialityCategoryId(),
        "specialityId" => $this->getSpecialityId(),
        "level" => $this->getLevel(),
        "formTraining" => $this->getFormTraining(),
        "department" => $this->getDepartment(),
        "periodTraining" => $this->getPeriodTraining(),
        "seats" => $this->getSeats(),
        "cost" => $this->getCost(),
        "startDocuments" => $this->getStartDocuments(),
        "stopDocuments" => $this->getStopDocuments()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "vuz" => $this->getVuz()->asArray(),
        "vuzStructure" => $this->getVuzStructure()->asArray(),
        "specialityCategory" => $this->getSpecialityCategory()->asArray(),
        "speciality" => $this->getSpeciality()->asArray(),
        "level" => $this->getLevel(),
        "formTraining" => $this->getFormTraining(),
        "department" => $this->getDepartment(),
        "periodTraining" => $this->getPeriodTraining(),
        "seats" => $this->getSeats(),
        "cost" => $this->getCost(),
        "startDocuments" => $this->getStartDocuments(),
        "stopDocuments" => $this->getStopDocuments()
        );
    }


}
