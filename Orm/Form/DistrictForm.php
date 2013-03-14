<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class districtForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'district';

    public function __construct()
    {
        self::$model = new \Orm\Model\District;
        					$this->init();
    }

    public function init()
    {
    }


}
