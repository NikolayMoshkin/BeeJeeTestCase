<?php
namespace app\controllers;

use ishop\App;
use app\models\AppModel;
use ishop\base\Controller;
use app\widgets\currency\Currency;
use ishop\Cache;
use RedBeanPHP\R;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel;
    
//        App::$app->setProperty('currencies', Currency::getCurrencies());
//        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
//        App::$app->setProperty('cats', self::cacheCategory());
    }
}
