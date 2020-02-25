<?php

namespace ishop;

use Exception;
use RedBeanPHP\R;

class Db
{
    use TSingletone;

    protected function __construct()
    {   
        $db =  require_once CONF.'/config_db.php';     
        R::setup($db['dsn'], $db['user'], $db['pass']);  

        if(!R::testConnection()) {
            throw new Exception('Нет соединения с БД', 500);
        }
        R::freeze(true);

        // if(DEBUG){
        //    R::fancyDebug(true); //вывод всех запросов перед загрузкой страницы
        // }
        if(DEBUG){
            R::debug(true, 1);
        }

        R::ext('xdispense', function($type){
            return R::getRedBean()->dispense($type);
        });
    }
}