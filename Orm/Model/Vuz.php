<?php
namespace Orm\Model;

use Orm\Model\VuzAbstract;

class Vuz extends VuzAbstract
{
	public function getAlbums($limit = 30){
		return $this->getOrm()->getPhotoAlbumFinder()->getByOwnerTypeId($this->getId(),2);
	}

	public function getVideos($limit = 30){
		return $this->getOrm()->getVideoFinder()->getByOwnerTypeId($this->getId(),2);
	}

	private function getStructureArray($id)
	{
		$structure = array();
		$childs = \Yii::app()->orm->getOrm()->getVuzStructureFinder()->getByVuzStructureId($id);

		$i=0;
		foreach ($childs as $key => $item)
		{
			$structure[$i] = $item->asArray();
			if($item->getIsParent())
			{
				$structure[$i]['children'] = $this->getStructureArray($item->getId());
			}
			else
			{
				$structure[$i]['children'] = '';
			}
			$i++;
		}

		return $structure;
	}

	public function getVuzStructure()
	{
		$structure = array();
		$firstChilds = \Yii::app()->orm->getOrm()->getVuzStructureFinder()->getBaseStructureByVuzId($this->getId(), 0);

		$i=0;
		foreach ($firstChilds as $key => $item)
		{
			$structure[$i] = $item->asArray();
			if($item->getIsParent())
			{
				$structure[$i]['children'] = $this->getStructureArray($item->getId());
			}
			else
			{
				$structure[$i]['children'] = '';
			}
			$i++;
		}

		return $structure;
	}

	public function asArrayFull()
	{
		return array(
			"id" => $this->getId(),
			"country" => $this->getCountry()->asArray(),
			"district" => $this->getDistrict()->asArray(),
			"region" => $this->getRegion()->asArray(),
			"city" => $this->getCity()->asArray(),
			"photoId" => $this->getPhotoId(),
			"title" => $this->getTitle(),
			"titleReduction" => $this->getTitleReduction(),
			"description" => $this->getDescription(),
			"yearBase" => $this->getYearBase(),
			"address" => $this->getAddress(),
			"site" => $this->getSite(),
			"phone" => $this->getPhone(),
			"fax" => $this->getFax(),
			"email" => $this->getEmail(),
			"licenseNumber" => $this->getLicenseNumber(),
			"licenseOrder" => $this->getLicenseOrder(),
			"licenseAuthority" => $this->getLicenseAuthority(),
			"licenseReallyDate" => $this->getLicenseReallyDate(),
			"accreditationNumber" => $this->getAccreditationNumber(),
			"accreditationOrder" => $this->getAccreditationOrder(),
			"accreditationAuthority" => $this->getAccreditationAuthority(),
			"accreditationReallyDate" => $this->getAccreditationReallyDate(),
			"timeCreate" => $this->getTimeCreate(),
			"timeUpdate" => $this->getTimeUpdate(),
			"typeStructure" => $this->getTypeStructure(),
			"typeIdVuz" => $this->getTypeIdVuz(),
			"typeTitleVuz" => $this->getTypeTitleVuz(),
			"foundationCourses" => $this->getFoundationCourses(),
			"military" => $this->getMilitary(),
			"hostel" => $this->getHostel(),
			"vuzStructure" => $this->getVuzStructure(),
		);
	}

}
