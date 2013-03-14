<?php
namespace Orm;

use Orm\Interfaces\ModelAbstractInterface;
use Orm\Exception\LogicException;
use Orm\Exception\SqlException;
use CActiveRecord;
use Yii;
use Zend\Validator\InArray;


abstract class ModelAbstract extends CActiveRecord implements ModelAbstractInterface
{

	public function onConstruct($args = array())
	{
		foreach ($args as $key => $value) {
			$method = "set" . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
		/*
		if($scenario===null) // internally used by populateRecord() and model()
			return;

		$this->setScenario($scenario);
		$this->setIsNewRecord(true);
		$this->_attributes=$this->getMetaData()->attributeDefaults;

		$this->init();

		$this->attachBehaviors($this->behaviors());
		$this->afterConstruct();
		*/
	}

	public function getOrm(){
		return \Yii::app()->orm->getOrm();
	}

	public static function initPrivelegeByUser(){

	}

	/**
	 * Returns the list of attribute names of the model.
	 * @return array list of attribute names.
	 */
	public function attributeNames()
	{
		// TODO: Implement attributeNames() method.
	}

	function isValid()
	{
		// TODO: Implement isValid() method.
		return true;
	}

	function save($runValidation = true, $attributes = null)
	{
		$this->_new = false;
		if ($this->isValid()) {
			$this->update($this->getAttributes());
		}
	}

	public function getPrimary()
	{
		return $this->getMetaData()->tableSchema->primaryKey;
	}

	/*
	 * @function getIMName return IdentityMap name
	 * @return string
	 */
	public function getIMName()
	{
		return $this->model() . '.' . $this->getId();
	}

	public function asArray()
	{
		//return $this->getAttributes();
	}

	public function getAttributes($names = true)
	{
		return $this->asArray();
	}

	public function updateAttributes($attributes = array()){
		foreach ($attributes as $key => $value){
			$methodName = 'set'.ucfirst($key);
			if (method_exists($this, $methodName)){
				$this->$methodName($value);
			}
		}
	}

	public function update($attributes = null)
	{
		if ($this->getIsNewRecord()) {
			throw new CDbException(Yii::t('yii', 'The active record cannot be updated because it is new.'));
		}
		$this->updateAttributes($attributes);
		if ($this->beforeSave()) {
			if ($this->getId() === null) {
				throw new \Exception("Id could not be null value");
			}
			$this->updateByPk($this->getId(), $this->getAttributes($attributes));
			$this->afterSave();
			return $this;
		} else {
			throw new LogicException("Record could not updated.");
		}
		//return false;
	}

	public function getIsNewRecord()
	{
		if (null == $this->getId() || $this->getId() < 1) {
			return true;
		} else {
			return false;
		}
	}

	public function insert($attributes = array())
	{
		if (!$this->getIsNewRecord()) {
			throw new LogicException("Insertation error! Record in not new.");
		}

		if ($this->beforeSave()) {
			Yii::trace(get_class($this) . '.insert()', 'system.db.ar.CActiveRecord');
			$builder = $this->getCommandBuilder();
			$table   = $this->getMetaData()->tableSchema;
			$command = $builder->createInsertCommand($table, $this->getAttributes($attributes));
			if ($command->execute()) {
				$primaryKey = $table->primaryKey;
				if ($table->sequenceName !== null) {
					if (is_string($primaryKey) && $this->$primaryKey === null) {
						$this->$primaryKey = $builder->getLastInsertID($table);
					} else {
						if (is_array($primaryKey)) {
							foreach ($primaryKey as $pk) {
								if ($this->$pk === null) {
									$this->$pk = $builder->getLastInsertID($table);
									break;
								}
							}
						}
					}
				}
				$this->setId($this->getPrimaryKey());
				$this->afterSave();
				$this->setIsNewRecord(false);
				$this->setScenario('update');

				return $this;
			}
		}

		return false;
	}

	public function delete(){
		if(!$this->getIsNewRecord())
		{
			if($this->beforeDelete())
			{
				$result=$this->deleteByPk($this->getId())>0;
				$this->afterDelete();
				return true;
			}
			else{
				throw new SqlException("SQL Exception");
			}
		}
		else{
			throw new LogicException("Could not delete object because record is new.");
		}
	}

}