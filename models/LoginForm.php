<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 23.03.2018
 * Time: 16:31
 */

namespace app\models;
use Yii;
use yii\base\Model;

class LoginForm  extends Model
{
    public $login;
    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'required', 'message' => 'Заполните поле'],
            ['login', 'email', 'message' => ' Введите электронную почту'],
            ['password', 'validatePass', 'message' => 'не верный пароль или логин'],
            //['login', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],

        ];
    }

    public function validatePass($attribute, $params){
        $user = $this->getUser();
        $hash = $user->password;
        $pass = $this->password;

        if (!$user ||  !(Yii::$app->getSecurity()->validatePassword($pass, $hash)))//(Yii::$app->getSecurity()->validatePassword($pass, $user)) $this->password != $pass
        {
            $this->addError($attribute, 'не верный логин или пароль');
        }
    }

    public function getUser(){
        return User::findOne(['login' => $this->login]);
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }
}
