<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class ProfileForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'Profile';

    public function __construct()
    {
        self::$model = new \Orm\Model\Profile;
    }

    public function init()
    {
    }


}
