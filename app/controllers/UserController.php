<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    public function indexAction() {
        echo"hello world";
        exit;
    }
    public function loginAction() {
        if(!empty($_POST)) {
            $user = new User();
                if($user->login()) {
                    $_SESSION['success'] = "Успешно авторизованы";
                    redirect();
                }else {
                    $_SESSION['errors'] = "Неверный логин или пароль";
                }
        }
        $this->setMeta('Авторизация');
    }
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkunique()) {
                $_SESSION['formData'] = $data;
                $user->getError();
            } else {
                $user->attributes['password'] = password_hash( $user->attributes['password'] , PASSWORD_DEFAULT);

                if($user->save('user')) {
                    $_SESSION['success'] = "Пользователь зарегистрирован";
                }else{
                    $_SESSION['error'] = 'Ошибка при регстирации';
                }



            }
            redirect();
        }


        $this->setMeta('Регистрация');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        redirect();
    }
}
