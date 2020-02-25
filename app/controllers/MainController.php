<?php

namespace app\controllers;

use app\controllers\AppController;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;
use ishop\Cache;

class MainController extends AppController
{
    public function indexAction(){


        $sort = isset($_GET['sort'])? $_GET['sort'] :'';
        $asc = isset($_GET['desc']) && $_GET['desc'] == 1 ? ' DESC' : ' ASC';

        $sql_sort = $sort ? 'ORDER BY ' . $sort . $asc : '';

        $total = R::count('tasks');

        if (!isset($_GET['page'])) $_GET['page'] = 1;
        $page = ($_GET['page'] > 1)? $_GET['page']: 1;

        $perpage = App::$app->getProperty('pagination');
        $pagination = new Pagination($page, $perpage, $total);
        $startPage = $pagination->getStart();

        $tasks = R::find('tasks', $sql_sort . " LIMIT $startPage, $perpage");


        $this->setMeta(App::$app->getProperty('app_name'),'Главная страница','менеджер задач');
        $this->set(compact('tasks', 'pagination'));

    }
    
}