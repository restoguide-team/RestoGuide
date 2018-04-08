<?php

namespace app\widgets;
use app\models\LoginForm;
use yii\base\Widget;




/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 26.03.2018
 * Time: 14:37
 */

class Login_wid extends Widget
{

    public function init(){

    }

    public function run()
    {
        $formlog = new LoginForm();
        return $this->render('login_view', ['formlog'=>$formlog, 'error'=>false] );
    }
}