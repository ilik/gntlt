<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class MatterTypeSortForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'MatterTypeSort';

    public function __construct()
    {
        self::$model = new \Orm\Model\MatterTypeSort;
        					$this->init();
    }

    public function init()
    {
    }


}
