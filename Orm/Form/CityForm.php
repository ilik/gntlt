<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class CityForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'City';

    public function __construct()
    {
        self::$model = new \Orm\Model\City;
    }

    public function init()
    {
    }


}
