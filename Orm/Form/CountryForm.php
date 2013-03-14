<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class CountryForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Country';

    public function __construct()
    {
        self::$model = new \Orm\Model\Country;
    }

    public function init()
    {
    }


}
