<?php

namespace app\models;

use RedBeanPHP\R;
use Valitron\Validator;
use app\models\AppModel;

class User extends AppModel
{

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

}