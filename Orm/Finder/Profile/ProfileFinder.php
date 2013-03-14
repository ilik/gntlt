<?php
namespace Orm\Finder\Profile;

use Orm\Finder\ProfileFinderAbstract;
use Orm\Model\Profile;

class ProfileFinder extends ProfileFinderAbstract
{
	public function getShortInfo()
	{
		return $this->getBuilder()
					->select('lastname, firstname, middlename, userId, regionId')
					->fetchAll();
	}

	public function getList()
	{
		//\Yii::app()->orm->getOrm()->getCountryFinder()->getAll();
		//\Yii::app()->orm->getOrm()->getRegionFinder()->getAll();

		return $this->getBuilder()
			->select('lastname, firstname, middlename, userId, countryId, regionId, cityId')
			->fetchAll();
	}

}
