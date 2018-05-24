<?php

namespace app\widgets;
use app\models\BookingForm;
use yii\base\Widget;




/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 26.03.2018
 * Time: 14:37
 */

class ButBooking_wid extends Widget
{

    public $id;
    public function init(){

    }

    public function run()
    {
        $form = new BookingForm();
        return $this->render('butBooking_view', ['form'=>$form, 'id'=>$this->id]);
    }
}