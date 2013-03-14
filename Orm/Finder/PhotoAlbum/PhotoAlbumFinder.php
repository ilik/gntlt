<?php
namespace Orm\Finder\PhotoAlbum;

use Orm\Finder\PhotoAlbumFinderAbstract;
use Orm\Model\PhotoAlbum;

class PhotoAlbumFinder extends PhotoAlbumFinderAbstract
{

	public function getList(){
		return $this->select('*')->fetchAll();
	}

	/*
	public function getByOwnerId($ownerId,$limit)
	{
		return $this->getBuilder()
			->select('*')
			->eq('ownerId', $ownerId)
			->fetchAll();
	}
	*/

	public function getByOwnerTypeId($id, $type){

		return  $this->getBuilder()
			->select('*')
			->eq('ownerId', $id)
			->eq('ownerType', $type)
			->fetchAll();

	}
}
