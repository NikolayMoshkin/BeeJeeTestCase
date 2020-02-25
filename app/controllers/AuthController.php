<?php

namespace app\controllers;

use app\controllers\AppController;
use ishop\App;
use RedBeanPHP\R;


class AuthController extends AppController
{
    public function signupAction()
    {
        $this->setMeta(App::$app->getProperty('app_name'),'Войти','менеджер задач');
    }

    public function loginAction()
    {
        unset($_SESSION['error']);
        $admin = R::findOne('users', 'where login = ?', ['admin']);

        $inputPassword = hash('sha1', $_POST['password']);

        if ($_POST['login'] == $admin['login'] && $_POST['password'] == hash_equals($admin['password'], $inputPassword)) {
            $_SESSION['user'] = $admin->login;
            redirect('/');
        }
        else {
            $_SESSION['error'] = 'Неверный логин / пароль';
            redirect('/auth/signup');
        }

    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        redirect('/');
    }
    
}