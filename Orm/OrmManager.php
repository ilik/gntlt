<?php
namespace Orm;

use CComponent;


/**
 * Created by JetBrains PhpStorm.
 * User: Gabushev
 * Date: 27.12.12
 * Time: 14:13
 * ORM Manager main class
 */
class OrmManager extends CComponent
{
	private static $_connection;
	//private $identityMap;
	private static $_instance;
	private static $sqlDb;
	private static $fastDb;
	private $finders = array();
	private $log = array();

	public function __construct()
	{
	}

	public function init()
	{
	}

	public function setDbs($args)
	{
		foreach ($args as $key => $value) {
			static::$$key = & \Yii::app()->$value;
		}
	}

	private function __clone()
	{
	}

	private function __wakeup()
	{
	}

	function __call($name, $args)
	{
		$object = null;
		//as getSuperFinder (Super is entity name)
		if (strstr($name, 'Finder')) {
			$finderName        = str_replace("get", "", $name);
			$finderName        = str_replace("Finder", "", $finderName);
			$objectRequestName = 'Orm\\Finder\\' . $finderName . '\\' . $finderName . 'Finder';
			if (!@class_exists($objectRequestName, true)) {
				throw new Exception\OrmException($finderName . " ---Finder is not exist");
			}
			try {
				if (isset($this->finders[ $name ])) {
					return $this->finders[ $name ];
				} else {
					$object = new $objectRequestName($finderName, null); //::getInstance();
					if ($object !== null) {
						$this->finders[ $name ] = $object;
						$object->setSql(new SQLBuilder(static::$sqlDb));

						return $object;
					} else {
						//throw new \Exception("no finder created");
						throw new Exception\OrmException("Entity - " . $finderName . " is not exist");
					}
				}

			} catch (\Exception $ex) {
				throw new Exception\OrmException($finderName . "---Could not create an object");
			}
		} else {
			if (class_exists(str_replace("get", "", $name))) {
				return new $name();
			} else {
				parent::__call($name, $args);
			}
		}

		return false;
	}


	private function getConnection()
	{
		return $this->_connection;
	}

	public static function getOrm()
	{
		if (null === self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function getLog()
	{
		return $this->log;
	}

	public function addLog($args)
	{
		array_push($this->log, $args);
	}

	public function getFinderCount()
	{
		return count($this->finders);
	}
}