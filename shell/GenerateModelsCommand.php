<?php
use Zend\Code\Generator\PropertyGenerator;
use Zend\Server\Reflection;
use Symfony\Component\Yaml\Parser;

/**
 *
 */
class GenerateModelsCommand extends CConsoleCommand
{
	/**
	 * @param array $args
	 * @return string
	 */

	private $isLog = false;
	private $log = array();
	private $insertFakes = false;
	private $dropTable = false;
	private $forms = false;

	private function getPath(array $args = array())
	{
		$result = "";
		$r      = 0;
		foreach ($args as $key => $value) {
			if (count($value) > 1) {
				$result .= $this->getPath($value);
			} else {
				if ($result[ strlen($result) - 1 ] == DIRECTORY_SEPARATOR) {
					$result = substr($result, 0, (strlen($result) - 1));
				}
				$result .= DIRECTORY_SEPARATOR . $value;
			}
		}

		return ltrim($result, '\\') . DIRECTORY_SEPARATOR;
	}

	function getHelp()
	{
		print_r("Options for this command:\n");
		print_r("\thelp - show this help\n");
		print_r("\tclean - truncate tables in DB\n");
		print_r("\tfake - load up data from fakes\n");
		print_r("\tform - generate formclasses\n");
		print_r("\tlog - logging SQL is on\n");
		print_r("Example: generatemodels help forms\n");

		return 0;
	}

	/**
	 * @param array $args
	 * @return int
	 */
	public function run($args = array())
	{
		foreach ($args as $key => $value) {
			switch ($value) {
				case 'help':
					$this->getHelp();

					return 0;
					break;
				case 'clean':
					$this->dropTable = true;
					break;
				case 'log':
					$this->isLog = true;
					break;
				case 'fake':
					$this->insertFakes = true;
					break;
				case 'form':
					$this->forms = true;
					break;
				default:
					print_r('unknown command ' . $value . '!\n');

					return 0;
					break;
			}
		}
		$fakes      = array();
		$ormDir     = array(
			dirname(__FILE__),
			'..',
			'..',
			'components',
			'Orm'
		);
		$ormPath    = $this->getPath($ormDir);
		$modelDir   = $this->getPath(array($ormDir, "config", "models"));
		$models     = scandir($modelDir);
		$yamlParser = new Parser();
		foreach ($models as $model) {
			if (strstr($model, '.yml')) {
				$modelYaml = $yamlParser->parse(file_get_contents($modelDir . $model));
				$modelCode = $this->generateModel($modelYaml[ 'name' ], $modelYaml);
				if (!is_dir($this->getPath(array($ormDir, "Model")))) {
					mkdir($this->getPath(array($ormDir, "Model")));
				}
				if (!file_exists(
					$this->getPath(array($ormDir, "Model")) . $modelYaml[ 'name' ] . '.php'
				)
				) {
					file_put_contents(
						$this->getPath(array($ormDir, "Model")) . $modelYaml[ 'name' ] . '.php',
						"<?php\n" . $modelCode
					);
				}
				$modelAbstractCode = $this->generateModelAbstract($modelYaml[ 'name' ], $modelYaml);
				file_put_contents(
					$this->getPath(array($ormDir, "Model")) . $modelYaml[ 'name' ] . 'Abstract' . '.php',
					"<?php\n" . $modelAbstractCode
				);
				if (!is_dir($this->getPath(array($ormDir, "Finder")))) {
					mkdir($this->getPath(array($ormDir, "Finder")));
				}
				$finderAbstractCode = $this->generateAbstractFinder($modelYaml[ 'name' ], $modelYaml);
				file_put_contents(
					$this->getPath(array($ormDir, "Finder")) . $modelYaml[ 'name' ] . 'FinderAbstract' . '.php',
					"<?php\n" . $finderAbstractCode
				);
				if (!is_dir($this->getPath(array($ormDir, "Finder", ucfirst($modelYaml[ 'name' ]))))) {
					mkdir(
						$this->getPath(array($ormDir, "Finder", ucfirst($modelYaml[ 'name' ])))
					);
				}
				if (!file_exists(
					$this->getPath(array($ormDir, "Finder", ucfirst($modelYaml[ 'name' ]))) . ucfirst(
						$modelYaml[ 'name' ]
					) . "Finder.php"
				)
				) {
					$finderConcreteCode = $this->generateConcreteFinder($modelYaml[ 'name' ], $modelYaml);
					file_put_contents(
						$this->getPath(array($ormDir, "Finder", ucfirst($modelYaml[ 'name' ]))) . ucfirst(
							$modelYaml[ 'name' ]
						) . "Finder.php",
						"<?php\n" . $finderConcreteCode
					);
				}
				$this->createTable($modelYaml[ 'name' ], $modelYaml);
				if ($this->insertFakes) {
					if (is_dir($this->getPath(array($ormDir, "config", "fakes")))) {
						if (file_exists(
							$this->getPath(array($ormDir, "config", "fakes")) . $modelYaml[ 'name' ] . '.php'
						)
						) {
							include $this->getPath(array($ormDir, "config", "fakes")) . $modelYaml[ 'name' ] . '.php';
							$insert     = $fakes[ strtolower($modelYaml[ 'name' ]) ];
							$finderName = 'get' . ucfirst($modelYaml[ 'name' ]) . 'Finder';
							$finder     = \Yii::app()->orm->getOrm()->$finderName();
							if (null !== $finder) {
								try {
									foreach ($insert as $key => $value) {
										$finder->create($value);
									}
								} catch (Exception $ex) {
									print_r($ex->getMessage() . "123" . $finderName . "\n");
								}

							}
							unset($key, $value, $insert);
							unset($finderName);
							unset($finder);
						}
					}
				}
				if ($this->forms) {
					if (is_dir($this->getPath(array($ormDir, "Form")))) {
						//TODO forget me not
						if (!file_exists(
							$this->getPath(array($ormDir, "Form")) . ucfirst($modelYaml[ 'name' ]) . 'Form' . '.php'
						)
						) {
							$formClassCode = $this->generateFormClass($modelYaml[ 'name' ], $modelYaml);
							file_put_contents(
								$this->getPath(array($ormDir, "Form")) . ucfirst(
									$modelYaml[ 'name' ]
								) . 'Form' . '.php',
								"<?php\n" . $formClassCode
							);
						}
					}
				}
			}
		}
		if ($this->isLog) {
			file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . "log.txt", implode("\n", $this->log) . "\n");
		}

		return 0;
	}

	/**
	 * @param       $name
	 * @param array $classArray
	 * @return string
	 */
	private function generateModel($name, array $classArray = array())
	{
		$namespace = "Orm\\Model";
		$className = ucfirst($name);
		$newClass  = new Orm\ClassGeneratorUse($name, $namespace);
		$newClass->setExtendedClass($name . 'Abstract');
		$newClass->addUserUse("Orm\\Model" . '\\' . $name . 'Abstract');

		return $newClass->generate();
	}

	//TODO добавить проверку типа аргумента и тип аргумента в definition'е методов
	/**
	 * @param        $fieldId
	 * @param string $modifier
	 * @return Zend\Code\Generator\MethodGenerator
	 */
	private function generateSetter($fieldId, $modifier = 'public')
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility($modifier);
		$method->setName('set' . ucfirst($fieldId));
		$method->setBody(
			'
						$this->' . lcfirst($fieldId) . ' = $' . $fieldId . ';' . "\n" . 'return $this;
        '
		);
		$method->setParameter(lcfirst($fieldId));

		return $method;
	}

	/**
	 * @param        $fieldId
	 * @param string $modifier
	 * @return Zend\Code\Generator\MethodGenerator
	 */
	private function generateGetter($fieldId, $modifier = 'public')
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility($modifier);
		$method->setName('get' . ucfirst($fieldId));
		$method->setBody('return $this->' . lcfirst($fieldId) . ';');

		return $method;
	}

	/**
	 * @param       $name
	 * @param array $classArray
	 * @return string
	 */
	public function generateModelAbstract($name, array $classArray = array())
	{
		$namespace = "Orm\\Model";
		$className = ucfirst($name);
		$newClass  = new Orm\ClassGeneratorUse($name . 'Abstract', $namespace);
		$newClass->setExtendedClass("ModelAbstract");
		$newClass->addUserUse('Orm\\ModelAbstract');
		$fields     = $classArray[ 'fields' ];
		$fieldsFull = array();
		foreach ($fields as $field => $params) {
			$newClass->addProperty($field, null, PropertyGenerator::FLAG_PRIVATE);
			$newClass->addMethodFromGenerator($this->generateGetter($field));
			$newClass->addMethodFromGenerator($this->generateSetter($field));
			if (isset($params[ 'object' ])) {
				//must contain "id" like as someObjectId
				//if $params['object'] == one then ORM knows about one to one relation by $fieldObject id param
				//else calls to fieldObject finder select method by this modelname getter with $this id field
				$fieldObject = preg_replace('/Id$/', "", $field);
				array_push($fieldsFull, array('name' => $fieldObject, 'type' => 'object'));
				$newClass->addProperty($fieldObject, null, PropertyGenerator::FLAG_PRIVATE);
				$newClass->addUserUse(
					'Orm\\Finder\\' . ucfirst($fieldObject) . '\\' . ucfirst($fieldObject) . 'Finder'
				);
				$newClass->addMethodFromGenerator(
					$this->generateModelObjectGetter($fieldObject, $name, 'public', $params[ 'object' ])
				);
			} else {
				array_push($fieldsFull, array('name' => $field, 'type' => 'data'));
			}
		}
		$newClass->addMethodFromGenerator($this->generateModelAbstractTablename($name));
		$newClass->addMethodFromGenerator($this->generateModelAbstractAsArray($classArray[ 'fields' ]));
		$newClass->addMethodFromGenerator($this->generateModelAbstractAsArrayFull($fieldsFull));

		return $newClass->generate();
	}

	public function generateModelAbstractAsArray($modelFields)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName("asArray");
		$body        = "return array(\n";
		$bodyStrings = array();
		foreach ($modelFields as $field => $prop) {
			array_push($bodyStrings, '"' . lcfirst($field) . "\" => " . '$this->' . 'get' . ucfirst($field) . "()");
		}
		$body .= implode(",\n", $bodyStrings) . "\n);\n";
		$method->setBody($body);

		return $method;
	}

	public function generateModelAbstractAsArrayFull($modelFields)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName("asArrayFull");
		$body        = "return array(\n";
		$bodyStrings = array();
		foreach ($modelFields as $field => $params) {
			if ($params[ 'type' ] == 'data') {
				array_push(
					$bodyStrings,
					'"' . lcfirst($params[ 'name' ]) . "\" => " . '$this->' . 'get' . ucfirst($params[ 'name' ]) . "()"
				);
			} else {
				array_push(
					$bodyStrings,
					'"' . lcfirst($params[ 'name' ]) . "\" => " . '$this->' . 'get' . ucfirst(
						$params[ 'name' ]
					) . "()->asArray()"
				);
			}

		}
		$body .= implode(",\n", $bodyStrings) . "\n);\n";
		$method->setBody($body);

		return $method;
	}

	public function generateModelAbstractTablename($modelName)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName("tableName");
		$method->setBody(
			'
					return \'' . strtolower($modelName) . '\';
		'
		);

		return $method;
	}

	public function generateFinderAbstractGetBuilder()
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName("getBuilder");
		$method->setBody(
			'
					return $this;'
		);

		return $method;
	}

	/**
	 * @param       $name
	 * @param array $classArray
	 */
	public function createTable($name, array $classArray = array())
	{
		$db = Yii::app()->db;


		$getFields = create_function(
			'$field, $params',
			'
			if (isset($params[\'options\'])){
			/*
				if (!strstr($params[\'options\'],"NOT NULL")){
					$params[\'options\'] .= " NULL";
				}
			*/
				return " `". $field ."`" . $params[\'type\'] . "" . " ".rtrim(implode(" ", $params[\'options\']), " ");
			}else{
				return " `". $field ."`" . $params[\'type\'] . "";
			}
			'
		);
		$sqlString = "";
		if ($this->dropTable) {
			$sqlString = "DROP TABLE IF EXISTS`" . $name . "`;";
		}
		$sqlString .= "CREATE TABLE IF NOT EXISTS `" . $name . "` (";
		$sqlParam = array();
		$i        = 0;
		foreach ($classArray[ 'fields' ] as $field => $params) {
			$sqlTmp = " `" . $field . "`" . $params[ 'type' ] . "";
			array_push($sqlParam, $getFields($field, $params));
		}

		$sqlString .= implode(", ", $sqlParam);
		if (isset($classArray[ 'index' ]) && count($classArray[ 'index' ]) > 0) {
			$sqlString .= ', ' . implode(', ', $classArray[ 'index' ]);
		}
		$sqlString .= " ) ";
		/*
		 * default engine
		 */
		$engine = "InnoDB";
		if (isset($classArray[ 'engine' ])) {
			$engine = $classArray[ 'engine' ];
		}
		$sqlString .= "ENGINE = " . $engine . " ";
		$sqlString .= "CHARACTER SET utf8 COLLATE utf8_general_ci;";

		//logging
		if ($this->isLog) {
			array_push($this->log, $sqlString);
		}
		try {
			$db->commandBuilder->createSqlCommand($sqlString)->execute();
		} catch (Exception $ex) {
			print_r("\n");
			print_r("Error in create table $name.\nError message: $ex->getMessage() \n\n;");
		}
	}

	public function generateAbstractFinder($modelName, $classArray = array())
	{
		$namespace = "Orm\\Finder";
		$className = ucfirst($modelName);
		$newClass  = new Orm\ClassGeneratorUse($modelName . 'FinderAbstract', $namespace);
		$newClass->setExtendedClass("FinderAbstract");
		$newClass->addUserUse('Orm\\FinderAbstract');
		$newClass->addStaticProperty('modelName', 'Orm\\Model\\' . ucfirst($modelName));
		$newClass->addStaticProperty('tableName', lcfirst($modelName));
		$newClass->addStaticProperty('_instance');
		//($name, $defaultValue = null, $isPublic = true, $staticType = 'static')
		$newClass->addMethodFromGenerator($this->generateFinderAbstractConstructor());

		foreach ($classArray[ 'fields' ] as $field => $params) {
			if (!$newClass->hasMethod("getBy" . ucfirst($field))) {
				if ("getBy" . ucfirst($field) == 'getById') {
					//$newClass->addMethodFromGenerator($this->generateSelect(array("0" => lcfirst($field)), 'one'));
				} else {
					if (empty($params[ 'object' ])) {
						$params[ 'object' ] = 'many';
					}
					$newClass->addMethodFromGenerator(
						$this->generateSelect(array("0" => lcfirst($field)), $params[ 'object' ])
					);
				}

			}
		}
		if (isset($classArray[ 'finder' ][ 'select' ])) {
			$select = $classArray[ 'finder' ][ 'select' ];

			foreach ($select as $oneSelect) {
				if (is_string($oneSelect[ 'fields' ]) or count($oneSelect[ 'fields' ]) == 1) {
					if (is_array($oneSelect[ 'fields' ])) {
						$tmpName = implode('', $oneSelect[ 'fields' ]);
					} else {
						$tmpName = $oneSelect[ 'fields' ];
					}
					if (!$newClass->hasMethod('getBy' . ucfirst($tmpName))) {
						$newClass->addMethodFromGenerator(
							$this->generateSelect($oneSelect[ 'fields' ], $oneSelect[ 'type' ])
						);
					}
				} else {
					$newClass->addMethodFromGenerator(
						$this->generateSelect($oneSelect[ 'fields' ], $oneSelect[ 'type' ])
					);
				}
			}
		}
		$newClass->addMethodFromGenerator($this->generateFinderAbstractGetBuilder());

		return $newClass->generate();
	}

	/*
	 * @param string $fetchType if this is many, then in method body using method fetchAll() else fetchOne()
	 *
	 */
	public function generateSelect($fields, $fetchType = 'many')
	{
		$fetchStatement = ($fetchType == 'many') ? 'fetchAll()' : 'fetchOne()';
		if (!is_array($fields)) {
			$fields = array("0" => $fields);
		}
		$methodName = "getBy";
		$count      = count($fields);
		if (count($fields) == 1) {
			$methodName .= ucfirst($fields[ 0 ]);
		} else {
			$count = count($fields);
			$methodName .= ucfirst($fields[ 0 ]);
			for ($i = 1; $i < $count; $i++) {
				$methodName .= 'And' . ucfirst($fields[ $i ]);
			}
		}

		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName($methodName);
		$body = '
			return $this->getBuilder()
			->select(\'*\')';
		unset($field);

		if ($count == 1) {
			$method->setParameter(lcfirst($fields[ 0 ]));
			$body .= "\n\t\t\t->eq('" . lcfirst($fields[ 0 ]) . '\', $' . lcfirst($fields[ 0 ]) . ')';
			$method->setBody(
				$body . "\n\t\t\t->" . $fetchStatement . ';'
			);
		} elseif ($count > 1) {
			foreach ($fields as $field) {
				$method->setParameter(lcfirst($field));
				$body .= "\n\t\t\t->eq('" . lcfirst($field) . '\', $' . lcfirst($field) . ')';
				//->eq(\'regionId\', $id)
			}
			$method->setBody(
				$body . "\n\t\t\t->" . $fetchStatement . ';'
			);
		}

		return $method;
	}

	public function generateFinderAbstractConstructor()
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setParameter('modelName');
		$method->setParameter('with');
		$method->setVisibility('public');
		$method->setName("__construct");
		$method->setBody(
			'
					parent::__construct(new static::$modelName(), array());
					'
		);

		return $method;
	}

	public function generateConcreteFinder($modelName, $classArray = array())
	{
		$namespace = "Orm\\Finder\\" . ucfirst($modelName);
		$className = ucfirst($modelName) . 'Finder';
		$newClass  = new Orm\ClassGeneratorUse($className, $namespace);
		$newClass->setExtendedClass($modelName . 'FinderAbstract');
		$newClass->addUserUse("Orm\\Finder" . '\\' . $modelName . 'FinderAbstract');
		$newClass->addUserUse("Orm\\Model" . '\\' . $modelName);

		return $newClass->generate();
	}

	public function generateModelObjectGetter($modelName, $thisModel, $modifier = 'public', $type = 'many')
	{
		$type     = ($type == 'many') ? $type : 'one';
		$modifier = ($modifier == 'public') ? $modifier : 'private';
		$method   = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility($modifier);
		$method->setName('get' . ucfirst($modelName));
		if ($type == 'many') {
			$method->setBody(
				'
							return \Yii::app()->orm->getOrm()->get' . ucfirst($modelName) . 'Finder()->getBy' . ucfirst(
					$thisModel
				) . 'Id($this->getId());
            '
			);
		} elseif ($type == 'one') {
			$method->setBody(
				'
							return \Yii::app()->orm->getOrm()->get' . ucfirst(
					$modelName
				) . 'Finder()->getById($this->get' . ucfirst($modelName) . 'Id());
                '
			);
		}

		return $method;
	}

	/*
	 * Forms generating
	 *
	 */
	private function generateFormClass($modelName, $classArray)
	{
		$namespace = "Orm\\Form";
		$className = ucfirst($modelName);
		$newClass  = new Orm\ClassGeneratorUse($modelName . 'Form', $namespace);
		$newClass->setExtendedClass("FormAbstract");
		$newClass->setImplementedInterfaces(array("FormInterface"));
		$newClass->addUserUse('Orm\\FormAbstract');
		$newClass->addUserUse('Orm\\Interfaces\\FormInterface');

		//$newClass->addStaticProperty('modelName', 'Orm\\Model\\' . ucfirst($modelName));
		$newClass->addStaticProperty('model');
		$newClass->addProperty('modelName', $modelName);

		$newClass->addMethodFromGenerator($this->generateFormConstructor($modelName));
		$newClass->addMethodFromGenerator($this->generateInit($classArray));

		foreach ($classArray[ 'fields' ] as $field => $params) {
			if (isset($params[ 'form' ])) {
				$inputType = 'element' . ucfirst($params[ 'form' ]);
				try {
					$newClass->addMethodFromGenerator($this->$inputType($field));
				} catch (Exception $ex) {
					print_r("\n\n");
					print_r('parameter "form" in ' . $field . ' not exist' . " \n");
					print_r("\n\n");
				}
			}
		}

		return $newClass->generate();
	}


	private function generateLabels($classArray)
	{
		$labels = array();
		foreach ($classArray[ 'fields' ] as $key => $params) {
			if (array_key_exists('label', $params)) {
				$labels[ $key ] = $params[ 'label' ];
			}
		}

		return $labels;
	}

	private function generateInit($classArray)
	{
		$labels = $this->generateLabels($classArray);
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName("init");
		if (count($labels) == 0) {
			$body = '';
		} else {
			$body = '
					$this->labels = array(
			';
			$body .= "\n";
			$strLabels = array();
			foreach ($labels as $key => $value) {
				$body .= "\t\"" . $key . '" => "' . $value . "\",\n";
			}
			$body .= "\n);";
		}
		$method->setBody(
			$body
		);

		return $method;
	}


	public function generateFormConstructor($modelName)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName("__construct");
		$method->setBody(
			'
					self::$model = new \\Orm\\Model\\' . ucfirst($modelName) . ';
					$this->init();
					'
		);

		return $method;
	}

	private function elementText($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			return $this->text("' . lcfirst($fieldId) . '", $args);
        '
		);
		$method->setParameter('args = array()');

		return $method;
	}

	private function elementSelect($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'//TODO set data var
		$data = array();
		return $this->select("' . lcfirst($fieldId) . '", $data, $htmlOptions = array());'
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

	private function elementCheckboxList($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			//TODO set data var
			$data = array();
			return $this->checkboxList($attribute, $data, $htmlOptions = array());
        '
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

	private function elementCheckbox($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			return $this->checkbox($attribute, $htmlOptions = array());
        '
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

	private function elementTextarea($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			return $this->textarea($attribute, $htmlOptions = array());
        '
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

	private function elementRadioButtonList($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			//TODO set data var
			$data = array();
			return $this->radioButtonList($attribute, $data, $htmlOptions);
        '
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

	private function elementRadioButton($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			return $this->radioButton($attribute, $htmlOptions);
        '
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

	private function elementHidden($fieldId)
	{
		$method = new \Zend\Code\Generator\MethodGenerator();
		$method->setVisibility('public');
		$method->setName(lcfirst($fieldId));
		$method->setBody(
			'
			return $this->hidden(\'' . $fieldId . '\', $htmlOptions = array());
        '
		);
		$method->setParameter('attribute');
		$method->setParameter('htmlOptions = array()');

		return $method;
	}

}