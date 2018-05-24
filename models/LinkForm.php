<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 22.03.2018
 * Time: 15:05
 */

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