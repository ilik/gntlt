<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class MatterTypeForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'MatterType';

    public function __construct()
    {
        self::$model = new \Orm\Model\MatterType;
    }

    public function init()
    {
    }


}
