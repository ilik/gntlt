<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class WallForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Wall';

    public function __construct()
    {
        self::$model = new \Orm\Model\Wall;
    }

    public function init()
    {
    }


}
