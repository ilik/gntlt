<?php
namespace Orm\Model;

use Orm\Model\PhotoAlbumAbstract;

class PhotoAlbum extends PhotoAlbumAbstract
{
	public function getProfile(){



		if ($this->getOwnerType()=="user") //user
			return \Yii::app()->orm->getOrm()->getProfileFinder()->getByUserId($this->getOwnerId());
		else if ($this->getOwnerType()=="vuz") //vuz
			return \Yii::app()->orm->getOrm()->getVuzFinder()->getById($this->getOwnerId());
		else
			return \Yii::app()->orm->getOrm()->getProfileFinder()->getByUserId($this->getOwnerId());
	}

}
