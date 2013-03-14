<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class MatterSortForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'MatterSort';

    public function __construct()
    {
        self::$model = new \Orm\Model\MatterSort;
    }

    public function init()
    {
    }


}
