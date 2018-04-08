<?php

namespace app\models;
use yii\db\ActiveRecord;

class Kitchen extends ActiveRecord
{
    public static function tableName()
    {
        return 'kitchen';
    }

    public function getKitchen_link()
    {
        return $this->hasMany(Kitchen_link::className(), ['kitchen' => 'id_kitchen']);
    }

}