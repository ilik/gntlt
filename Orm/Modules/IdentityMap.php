<?php
namespace Orm\Modules;

/**
 * Created by JetBrains PhpStorm.
 * User: Gabushev
 * Date: 22.01.13
 * Time: 14:07
 * To change this template use File | Settings | File Templates.
 */
class IdentityMap
{
	protected static $_instance;

	function __construct()
	{

	}

	private static function getInstance()
	{
		if (null === self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function getMap()
	{
		return self::getInstance();
	}

}