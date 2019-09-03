<?php


namespace app\models;



use RedBeanPHP\R;

class User extends AppModel
{
    public $attributes = [
        'login'=> '',
        'email'=> '',
        'password'=> '',
        'firstName'=> '',
        'lastName'=> '',
        'telephone'=> '',
        'role'=>'user',
    ];
    public $rules = [
        'required' => [
           ['login'],
           ['email'],
           ['password'],
           ['firstName'],
           ['lastName'],
           ['telephone'],
        ],
        'email'=>[
            ['email']
        ],
        'lengthMin' => [
            ['password',6],

        ]
    ];
    public function checkunique() {

        $user = R::findOne('user','login = ? or email =? or telephone =?',
            [$this->attributes['login'],$this->attributes['email'], $this->attributes['telephone']]);

        if($user) {
            if($user->login ==$this->attributes['login']) {
                $this->errors['unique'][]= "Пользователь с данным логином уже зарегистрирован";
            }
            if($user->email ==$this->attributes['email']) {
                $this->errors['unique'][]= "Пользователь с данным почтовым ящиком уже зарегистрирован";
            }
            if($user->telephone ==$this->attributes['telephone']) {
                $this->errors['unique'][]= "Пользователь с данным номером телефона уже зарегистрирован";
            }
            return false;
        }
        return true;
    }

    public function login($isAdmin=false) {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password) {
            if($isAdmin) {
                $user = R::findOne('user', "login = ? && role = 'admin' ", [$login]);
            } else {
                $user = R::findOne('user', "login = ?  ", [$login]);
            }
            if($user) {
                if(password_verify($password, $user->password)) {
                    foreach ($user as $k=> $v) {
                        if($k != "password") $_SESSION['user'][$k] =$v;
                    }
                    return true;
                }
            } else {
                return false;
            }

        }
    }
}
