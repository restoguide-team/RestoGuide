<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 28.03.2018
 * Time: 0:28
 */

namespace app\models;
use Yii;
use yii\base\Exception;
use yii\base\Model;

class RegistrationUserForm  extends Model
{
    public $login;
    public $password;
    public $name;
    public $secondname;
    public $phone;

    public function rules()
    {
        return [
            [['name','secondname','login', 'password', 'phone'], 'required', 'message' => 'Заполните поле'],
            ['login', 'email', 'message' => ' Введите электронную почту'],
            [['login'], 'unique', 'message' => 'Этот логин уже используется'],
            ['login', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],

        ];
    }

    public function saveuser(){
        $user = new User();
        $user->login=$this->login;
        try {
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        } catch (Exception $e) {

        }
        $user->name=$this->name;
        $user->secondname=$this->secondname;
        $user->phone=$this->phone;
        if(!$user->save()){
            throw new HttpException(404 ,'оуу мы вас не зарегестрировали');
        }

    }

}