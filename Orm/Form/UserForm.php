<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class UserForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'User';

    public function __construct()
    {
        self::$model = new \Orm\Model\User;
        					$this->init();
    }

    public function init()
    {
    }


}
