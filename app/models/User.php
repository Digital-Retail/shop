<?php


namespace app\models;


class User extends AppModel
{
    public $attributes = [
        'login'=> '',
        'email'=> '',
        'passwords'=> '',
        'firstName'=> '',
        'lastName'=> '',
        'mobile'=> '',
    ];
}