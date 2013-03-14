<?php
namespace Orm;

use CDbConnection;

class SQLBuilder
{
	/*
	 * @var CDbCommand $currentQuery
	 */
	private static $_db;
	private $currentQuery;
	private $result = array();
	public $from;


	public function clearBuilder()
	{
		$this->currentQuery = self::$_db->createCommand();
	}

	public function getResult()
	{
		return $this->result;
	}

	public function __construct(CDbConnection $db)
	{
		static::$_db = $db;
		$this->currentQuery = static::$_db->createCommand();
	}

	public function getSelectBuilder()
	{
		//$this->currentQuery = static::$_db->createCommand();
	}

	public function getFetchAll()
	{
		$log = array();
		$timeStart = microtime(true);
		$result = $this->currentQuery->query()->readAll();
		$timeEnd = microtime(true);
		$log['query'] = $this->currentQuery->pdoStatement->queryString;
		$log['executionTime'] = $timeEnd - $timeStart;
		$log['countElements'] = count($result);
		\Yii::app()->orm->getOrm()->addLog($log);
		return $result;
	}

	/*
	 * @return Object or false if result is empty
	 */
	public function getFetchOne()
	{
		$log = array();
		$timeStart = microtime(true);
		$result = $this->currentQuery->query()->read();
		$timeEnd = microtime(true);
		$log['query'] = $this->currentQuery->pdoStatement->queryString;
		$log['executionTime'] = $timeEnd - $timeStart;
		$log['countElements'] = (null === $result)?1:0;
		\Yii::app()->orm->getOrm()->addLog($log);
		return $result;
	}

	public function setFrom($from)
	{
		$this->from = $from;
		$this->currentQuery->setFrom($from);
	}

	public function setEq($field, $value)
	{
		$this->currentQuery->setWhere(strval($field) . ' = ' . strval($value));
	}

	//bigger than
	public function setBt($field, $value)
	{
		$this->currentQuery->setWhere(strval($field) . ' > ' . strval($value));
	}

	//less than
	public function setLt($field, $value)
	{
		$this->currentQuery->setWhere(strval($field) . ' < ' . strval($value));
	}

	public function setBtOrEq($field, $value)
	{
		$this->currentQuery->setWhere(strval($field) . ' >=' . strval($value));
	}

	//less than
	public function setLtOrEq($field, $value)
	{
		$this->currentQuery->setWhere(strval($field) . ' =< ' . strval($value));
	}

	public function setSelect($fields = array())
	{
		$this->currentQuery->setSelect($fields);
	}

	public function setLimit($limit = 30, $fromId = 0){
		$this->setBt('id', $fromId);
		$this->currentQuery->setLimit($limit);
	}

	public function setCount($field = null)
	{
		$countField = (null === $field)?'*':'`'.$field.'`';
		if (strlen($this->currentQuery->getSelect())>0){
			$str = $this->currentQuery->getSelect();
			$array = explode(',', $str);
			$array[count($array)] = 'count('.$countField.')';
			$this->setSelect(implode(',', $array));
		}else{
			$this->currentQuery->setSelect('count('.$countField.')');
		}
	}
}