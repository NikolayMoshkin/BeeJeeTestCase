<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\User;
use ishop\App;
use RedBeanPHP\R;

class TasksController extends AppController
{
    public function addAction()
    {
        $task = R::dispense('tasks');

        $task['name'] = safe($_POST['name']);
        $task['email'] = safe($_POST['email']);
        $task['body'] = safe($_POST['body']);
        $id = R::store($task);

        redirect('/');
        die;

    }

    public function editAction()
    {
        if (!User::checkAuth()){
            echo 'Вы не авторизованы';
            die;
        };

        $id = $_POST['id'];
        $body = $_POST['body'];

        $task = R::load( 'tasks', $id);
        $task->body = $body;
        $task->edited = 1;
        R::store($task);
        echo 'Задание отредактировано';
        die;
    }

    public function toggleAction()
    {
        if (!User::checkAuth()){
            echo 'Вы не авторизованы';
            die;
        };

        $id = $_POST['id'];
        $checked = $_POST['checked'];

        $task = R::load( 'tasks', $id);
        $task->status = $checked ? 1 : 0;
        R::store($task);
        echo 'Статус задания изменен';
        die;

    }
}