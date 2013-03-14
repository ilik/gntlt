<?php
namespace Orm\Model;

use Orm\Model\DepartmentAbstract;

class Department extends DepartmentAbstract
{
	public function getDisciplines(){
		return \Yii::app()->orm->getOrm()->getDisciplineFinder()->getByDepartmentId($this->getId());
	}

}
