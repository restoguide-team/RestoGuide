<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 12.05.2018
 * Time: 17:17
 */

namespace app\models;
use Yii;
use yii\base\Model;

class BookingForm extends Model
{
    public $data;
    public $count;
    public $rest;
    public function rules()
    {
        return [
            [['data', 'count', 'rest'], 'required', 'message' => 'Заполните поле'],
        ];
    }
}