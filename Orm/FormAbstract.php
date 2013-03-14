<?php
namespace Orm;

use helpers\Html;

class FormAbstract
{
	private static $model;
	public $modelName = '';
	public $labels = array();

	public function __construct()
	{
		$this->init();
	}

	/*
	 * public methods
	 */
	public function label($text, $forElement, $args = array())
	{
		return \helpers\Html::label($text, $forElement, $args);
	}

	public function text($fieldName, $args = array())
	{
		return \helpers\Html::activeTextField(static::$model, $fieldName, $args);
	}

	public function select($attribute, $data, $htmlOptions = array())
	{
		return \helpers\Html::activeDropDownList(static::$model, $attribute, $data, $htmlOptions);
	}

	public function checkboxList($attribute, $data, $htmlOptions = array())
	{
		return \helpers\Html::activeCheckBoxList(static::$model, $attribute, $data, $htmlOptions);
	}

	public function checkbox($attribute, $htmlOptions = array())
	{
		return \helpers\Html::activeCheckBox(static::$model, $attribute, $htmlOptions);
	}

	public function textarea($attribute, $htmlOptions = array())
	{
		return \helpers\Html::activeTextArea(static::$model, $attribute, $htmlOptions);
	}

	public function radioButtonList($attribute, $data, $htmlOptions)
	{
		return \helpers\Html::activeRadioButtonList(static::$model, $attribute, $data, $htmlOptions);
	}

	public function radioButton($attribute, $htmlOptions)
	{
		return \helpers\Html::activeRadioButton(static::$model, $attribute, $htmlOptions);
	}

	public function submit($label = "Отправить", $htmlOptions = array())
	{
		return \helpers\Html::button($label, $htmlOptions);
	}

	public function hidden($attribute, $htmlOptions = array())
	{
		return \helpers\Html::activeHiddenField(static::$model, $attribute, $htmlOptions);
	}

	/*
	 * in args array must be (if needed) pairs assigned to field or start and end form
	 * for example:
	 * {beginForm: {someargs}, name: {'style':'asd qwe', 'maxlenght' : 12}}
	 */
	public function form($args = array())
	{
		$form      = array();
		$argsBegin = array();
		$argsEnd   = array();
		if (isset($args[ 'beginForm' ])) {
			$argsBegin = $args[ 'beginForm' ];
		}
		if (isset($args[ 'endForm' ])) {
			$argsEnd = $args[ 'endForm' ];
		}
		$fields = static::$model->asArray();

		array_push($form, $this->beginForm($argsBegin));
		foreach ($fields as $key => $value) {
			$element = array();
			if (array_key_exists($key, $this->labels)) {
				array_push($element, $this->labels[ $key ]);
			}
			$params = array();
			if (array_key_exists($key, $args)) {
				$params = $args[ $key ];
			}
			array_push($element, $this->$key($params));
			array_push($form, implode('', $element));
			unset($params, $element);
		}
		array_push($form, $this->submit());
		array_push($form, $this->endForm());

		return $form;
	}


	public function beginForm($args = null)
	{
		$inputArgs = $args;
		if ( null === $inputArgs ) {
			$inputArgs = array("class" => $this->modelName . 'Form');
		} else{
			if (isset ($args['class'])){
				$inputArgs['class'] .= $this->modelName . 'Form';
			}else{
				array_push($inputArgs, array("class" => $this->modelName . 'Form'));
			}
		}
		return \helpers\Html::beginForm($this->modelName, 'POST', $inputArgs);
	}

	public function endForm($args = array())
	{
		return \helpers\Html::endForm($this->modelName, 'POST', $args);
	}
}