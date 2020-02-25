<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($user->attributes) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $user->attributes;
            }
            else{
                $user->attributes['password'] = password_hash( $user->attributes['password'], PASSWORD_DEFAULT);
                $user_id = $user->save('user');
                if($user_id){
                    $_SESSION['success'] = 'Пользователь зарегистрирован';
                    unset($_SESSION['form_data']);
                    $user->saveSession($user_id);
                }
                else{
                    $_SESSION['error'] = 'Ошибка: не удалось записать пользователя в базу данных';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
            }else{
                $_SESSION['error'] = 'Логин или пароль введены неверно';
            }
            unset($_SESSION['form_data']);
        }
        
        $this->setMeta('Вход');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }
}