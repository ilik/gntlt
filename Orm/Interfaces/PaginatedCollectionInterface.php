<?php
namespace Orm\Interfaces;

/**
 * Created by JetBrains PhpStorm.
 * User: Gabushev
 * Date: 10.01.13
 * Time: 15:35
 * To change this template use File | Settings | File Templates.
 */
interface PaginatedCollectionInterface
{
	function getById();

	function get($from, $limit);
}