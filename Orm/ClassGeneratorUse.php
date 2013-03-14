<?php
namespace Orm;

use Zend\Code\Generator\ClassGenerator;

class ClassGeneratorUse extends ClassGenerator
{

	protected $uses = array();
	protected $staticProperties = array();

	public function addStaticProperty($name, $defaultValue = null, $isPublic = true, $staticType = 'static')
	{
		if (is_string($name)) {
			array_push(
				$this->staticProperties,
				array(
				     "name"       => $name,
				     "visibility" => ($isPublic == true) ? 'public' : 'private',
				     "defaultVal" => ($defaultValue === null) ? '' : $defaultValue,
				     "type"       => $staticType
				)
			);
		}
	}

	public function getStaticProperties()
	{
		return $this->staticProperties;
	}

	public function addUserUse($useStatement)
	{
		$useNameArr = explode('\\', $useStatement);
		$this->uses[ $useNameArr[ count($useNameArr) - 1 ] ] = $useStatement;
	}


	public function generate()
	{
		if (!$this->isSourceDirty()) {
			$output = $this->getSourceContent();
			if (!empty($output)) {
				return $output;
			}
		}

		$output = '';

		if (null !== ($namespace = $this->getNamespaceName())) {
			$output .= 'namespace ' . $namespace . ';' . self::LINE_FEED . self::LINE_FEED;
		}

		if (count($this->uses) > 0) {
			foreach ($this->uses as $use => $statement) {
				$output .= 'use ' . $statement . ';' . self::LINE_FEED;
			}
			$output .= self::LINE_FEED;
		}

		if (null !== ($docBlock = $this->getDocBlock())) {
			$docBlock->setIndentation('');
			$output .= $docBlock->generate();
		}

		if ($this->isAbstract()) {
			$output .= 'abstract ';
		}

		$output .= 'class ' . $this->getName();

		if (!empty($this->extendedClass)) {
			$output .= ' extends ' . $this->extendedClass;
		}

		$implemented = $this->getImplementedInterfaces();
		if (!empty($implemented)) {
			$output .= ' implements ' . implode(', ', $implemented);
		}

		$output .= self::LINE_FEED . '{' . self::LINE_FEED . self::LINE_FEED;

		$staticProperties = $this->getStaticProperties();
		if (!empty($staticProperties)) {
			foreach ($staticProperties as $property) {
				$output .= $property[ 'visibility' ] . ' ' . $property[ 'type' ] . ' ' . '$' . $property[ 'name' ];
				if ($property[ 'defaultVal' ] != '') {
					$output .= " = ";
					if (is_string($property[ 'defaultVal' ])) {
						$output .= '"' . addslashes($property[ 'defaultVal' ]) . '"';
					} else {
						$output .= $property[ 'defaultVal' ];
					}

				}
				$output .= ';' . self::LINE_FEED;
			}
		}

		$properties = $this->getProperties();
		if (!empty($properties)) {
			foreach ($properties as $property) {
				$output .= $property->generate() . self::LINE_FEED . self::LINE_FEED;
			}
		}

		$methods = $this->getMethods();
		if (!empty($methods)) {
			foreach ($methods as $method) {
				$output .= $method->generate() . self::LINE_FEED;
			}
		}

		$output .= self::LINE_FEED . '}' . self::LINE_FEED;

		return $output;
	}
}