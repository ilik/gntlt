<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class AuthorsForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Authors';

    public function __construct()
    {
        self::$model = new \Orm\Model\Authors;
    }

    public function init()
    {
    }


}
