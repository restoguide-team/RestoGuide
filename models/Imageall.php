<?php

namespace app\models;
use yii\db\ActiveRecord;


class Imageall extends ActiveRecord
{
    public static function tableName()
    {
        return 'imageall';
    }

    public function getResto()
    {
        return $this->hasOne(Resto::className(), ['id_rest' => 'restaurant']);
    }

}