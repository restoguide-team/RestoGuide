<?php

namespace app\models;


use yii\base\Model;

class LinkForm extends Model
{
    public $username;
    public $tel;
    public $email;
    public $text;

    public function rules()
    {
        return [
          [['email', 'tel', 'username'], 'required'],
            ['email', 'email'],

        ];
    }
}