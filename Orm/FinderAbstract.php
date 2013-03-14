<?php
namespace Orm;

use CActiveFinder;
use CDbCriteria;
use Zend\Form\Annotation\Object;
use Zend\Server\Reflection\ReflectionClass;
use Orm\ResultMap;
use Orm\SQLBuilder;

/**
 *
 */
class FinderAbstract extends CActiveFinder implements FinderAbsctractInterface
{
	/*
	 * @var $modelName one from \Orm\Models
	 * @var $collection set of some in \Orm\Models
	 * @var SQLBuilder $sqlBuilder
	 */
	public static $modelName;
	private static $_instance;
	private static $tableName;
	private $collection;
	private $sqlBuilder;

	public function __construct($model, $with)
	{
		$this->collection = new ResultMap(null, false);
		parent::__construct($model, $with);
	}

	private static $_identityMap = array();

	/**
	 *
	 */
	public function init()
	{
		$this->collection = new ResultMap(null, false);
	}

	public function getOrm()
	{
		return \Yii::app()->orm->getOrm();
	}

	public function setSql(SQLBuilder $sql)
	{
		$this->sqlBuilder = $sql;
		$this->from(); //sqlBuilder->setFrom(static::$tableName);
	}

	/**
	 * @return FinderAbstract
	 */
	public static function getInstance()
	{
		/*
		if (null === self::$_instance) {
			self::$_instance = new static(self::$modelName, array());
		}
		return self::$_instance;
		*/
	}

	public function getById($id)
	{
		$result = $this->getCollection()->getById($id);
		if (null === $result) {
			$result = $this->select('*')->eq('id', $id)->fetchOne();
		}

		return $result;
	}

	/**
	 * @return mixed
	 */
	public function asArray()
	{
		return $this->getCollection()->asArray();
	}

	/*
	 * @return \ResultMap    current collection in finder
	 */
	public function getCollection()
	{
		if ($this->collection instanceof ResultMap) {
			return $this->collection;
		} else {
			$this->collection = new ResultMap(null, false);
		}

		return $this->collection;
	}

	/**
	 * @param \ModelAbstract $item
	 */
	public function add($item)
	{
		if (null === $item) {
			return;
		}
		$addingItem = new static::$modelName();
		$addingItem->onConstruct($item);
		$this->collection->add($addingItem->getId(), $addingItem);
	}

	/**
	 * @param $args
	 */
	public function setCollection($args)
	{
		if (null === $this->collection) {
			$this->collection = new ResultMap();
		}
		foreach ($args as $item) {
			$addingItem = new static::$modelName();
			$addingItem->onConstruct($item);
			$this->collection->add($addingItem->getId(), $addingItem);
		}
	}


	/*
	 * API-db level block
	 */
	/**
	 * @param $data
	 * @return mixed
	 * @throws \Exception
	 */
	public function create(array $data = array())
	{
		$model = new static::$modelName();
		$model->onConstruct($data);
		if ($model->isValid()) {
			$model->insert();

			return $model;
		} else {
			throw new \Exception('Model data is not valid!');
		}
	}


	/*
    * @return \Orm\SQLBuilder
    */
	public function getSqlBuilder()
	{
		return $this->sqlBuilder;
	}

	/*
	 * SQL Commands block
	 */

	public function select($fields)
	{
		$this->getSqlBuilder()->setSelect($fields);

		return $this;
	}

	public function fetchAll()
	{
		$result = $this->getSqlBuilder()->getFetchAll();
		$this->setCollection($result);
		$this->getSqlBuilder()->clearBuilder();
		$this->from();
		if (!$result) {
			return new ResultMap(new static::$modelName());
		}
		$this->from();
		$fetchResult = new ResultMap();
		$fetchResult->fillModels($result, static::$modelName);

		return $fetchResult;
	}

	/*
	 * @return Object or false if result is empty
	 */
	public function fetchOne()
	{
		$result = $this->getSqlBuilder()->getFetchOne();
		$this->getSqlBuilder()->clearBuilder();
		$this->from(); //sqlBuilder->setFrom(static::$tableName);
		if (!$result) {
			throw new Exception\NullResultException(static::$modelName . "---" . 'Object is empty');
		}
		$this->add($result);

		return $this->getCollection()->getById($result[ 'id' ]);
	}

	public function from($from = null)
	{
		//$this->getSqlBuilder()->setFrom($from);
		if (null === $from) {
			$from = static::$tableName;
		}
		$this->getSqlBuilder()->setFrom($from);

		return $this;
	}

	public function eq($field, $value)
	{
		$this->getSqlBuilder()->setEq($field, $value);

		return $this;
	}

	/*
	 * less then
	 */
	public function lt($field, $value)
	{
		$this->getSqlBuilder()->setLt($field, $value);

		return $this;
	}

	/*
	 * bigger then
	 */
	public function bt($field, $value)
	{
		$this->getSqlBuilder()->setBt($field, $value);

		return $this;
	}

	/*
	 * less then or equals
	 */
	public function ltEq($field, $value)
	{
		$this->getSqlBuilder()->setLtOrEq($field, $value);

		return $this;
	}

	/*
	 * bigger then or equals
	 */
	public function btEq($field, $value)
	{
		$this->getSqlBuilder()->setBtOrEq($field, $value);

		return $this;
	}

	public function count($field = null)
	{
		$this->getSqlBuilder()->setCount($field);

		return $this;
	}

	public function limit($limit = 30, $fromId = 0)
	{
		$this->getSqlBuilder()->setLimit($limit, $fromId);

		return $this;
	}

	public function getAll()
	{
		return $this
			->getBuilder()
			->select('*')
			->fetchAll();
	}
}

interface FinderAbsctractInterface
{
	public function count($field = null);
}