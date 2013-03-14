<?php
namespace Orm\Finder\VuzStructure;

use Orm\Finder\VuzStructureFinderAbstract;
use Orm\Model\VuzStructure;

class VuzStructureFinder extends VuzStructureFinderAbstract
{

	public function getBaseStructureByVuzId($vuzId, $vuzStructureId = 0)
	{
		return $this->getBuilder()
			->select('*')
			->eq('vuzId', $vuzId)
			->eq('vuzStructureId', $vuzStructureId)
			->fetchAll();
	}

}
