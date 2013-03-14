<?php
namespace Orm\Form;

use Orm\FormAbstract;
use Orm\Interfaces\FormInterface;

class WallPostForm extends FormAbstract implements FormInterface
{

public static $model;
    public $modelName = 'WallPost';

    public function __construct()
    {
        self::$model = new \Orm\Model\WallPost;
    }

    public function init()
    {
    }


}
