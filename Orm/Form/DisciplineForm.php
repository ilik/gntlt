<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class DisciplineForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Discipline';

    public function __construct()
    {
        self::$model = new \Orm\Model\Discipline;
    }

    public function init()
    {
    }


}
