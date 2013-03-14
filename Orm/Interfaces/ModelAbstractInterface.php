<?php
namespace Orm\Interfaces;

interface ModelAbstractInterface
{
	function validate();

	function isValid();

	function save();

	function asArray();
	function asArrayFull();
}