<?php
namespace Orm\Model;

use Orm\ModelAbstract;
use Orm\Finder\Department\DepartmentFinder;

class DisciplineAbstract extends ModelAbstract
{

    private $id = null;

    private $departmentId = null;

    private $department = null;

    private $title = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
        return $this;
    }

    public function getDepartment()
    {
        return \Yii::app()->orm->getOrm()->getDepartmentFinder()->getById($this->getDepartmentId());
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function tableName()
    {
        return 'discipline';
    }

    public function asArray()
    {
        return array(
        "id" => $this->getId(),
        "departmentId" => $this->getDepartmentId(),
        "title" => $this->getTitle()
        );
    }

    public function asArrayFull()
    {
        return array(
        "id" => $this->getId(),
        "department" => $this->getDepartment()->asArray(),
        "title" => $this->getTitle()
        );
    }


}
