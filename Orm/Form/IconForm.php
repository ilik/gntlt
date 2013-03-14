<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class IconForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Icon';

    public function __construct()
    {
        self::$model = new \Orm\Model\Icon;
    }

    public function init()
    {
    }


}
