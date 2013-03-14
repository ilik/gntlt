<?php
namespace Orm\Model;

use Orm\Model\ProfileAbstract;
use Orm\ResultMap;

class Profile extends ProfileAbstract
{

	public function getAlbums($limit = 30){
		//return $this->getOrm()->getPhotoAlbumFinder()->getByOwnerId($this->getUserId());
		return $this->getOrm()->getPhotoAlbumFinder()->getByOwnerTypeId($this->getUserId(),1);
	}

	public function getVideos($limit = 30){
		return $this->getOrm()->getVideoFinder()->getByOwnerTypeId($this->getUserId(),1);
	}




	public function asArray()
	{
		return array(
			"id" => $this->getId(),
			"lastname" => $this->getLastname(),
			"firstname" => $this->getFirstname(),
			"middlename" => $this->getMiddlename(),
			"userId" => $this->getUserId(),
			"birthday" => $this->getBirthday(),
			"birthdayIsPublic" => $this->getBirthdayIsPublic(),
			"sex" => $this->getSex(),
			"countryId" => $this->getCountryId(),
			"regionId" => $this->getRegionId(),
			"districtId" => $this->getDistrictId(),
			"cityId" => $this->getCityId(),
			"science" => $this->getScience(),
			"religion" => $this->getReligion(),
			"sport" => $this->getSport(),
			"music" => $this->getMusic(),
			"movie" => $this->getMovie(),
			"book" => $this->getBook()
		);
	}

}
