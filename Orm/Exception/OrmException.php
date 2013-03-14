<?php
namespace Orm\Exception;

class OrmException extends \Exception{
	public $resource;
	public $message;
	public function __construct($message = "", $code = 0, Exception $previous = null) {
		if (strstr($message, '---')){
			$parsedMsg = explode('---', $message);
			$this->resource = $parsedMsg[0];
			$this->message = $parsedMsg[1];
			$message = $this->message;
		}
		parent::__construct($message,$code,$previous);
	}
	public function getResource(){
		return $this->resource;
	}
}