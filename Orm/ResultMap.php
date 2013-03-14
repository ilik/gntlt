<?php
namespace Orm;

use CMap;
use Orm\Interfaces\CollectionInterface;

class ResultMap extends CMap implements CollectionInterface
{
	public function __construct($data = null, $readOnly = false)
	{
		if ($data !== null) {
			$this->copyFrom($data);
		}
		$this->setReadOnly($readOnly);
		//parent::__construct($data, false);
	}

	public function getById($id)
	{
		// result === null if empty
		return $this->itemAt($id);
	}

	public function getFirst()
	{
		$keys = $this->getKeys();

		try {
			$item = $this->getById(array_pop($keys));
		} catch (\Exception $ex) {
			$item = null;
		}

		return $item;
	}

	function asArray()
	{
		$array       = $this->toArray();
		$resultArray = array();
		foreach ($array as $key => $value) {
			array_push($resultArray, $value->asArray());
		}

		return $resultArray;
	}

	function asArrayFull()
	{
		$array       = $this->toArray();
		$resultArray = array();
		foreach ($array as $key => $value) {
			array_push($resultArray, $value->asArrayFull());
		}

		return $resultArray;
	}

	function fillModels($args, $modelName)
	{
		foreach ($args as $item) {
			$addingItem = new $modelName();
			$addingItem->onConstruct($item);
			$this->add($addingItem->getId(), $addingItem);
		}
	}
}