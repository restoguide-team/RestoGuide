<?php


namespace app\models;
 use yii\db\ActiveRecord;

class Resto extends ActiveRecord
{
    public static function tableName()
    {
        return 'restaurant';
    }

    public function getImage()
    {
        return $this->hasOne(Image::className(), ['restaurant' => 'id_rest']);
    }

    public function getImageall()
    {
        return $this->hasMany(Imageall::className(), ['restaurant' => 'id_rest']);
    }

    public function getKitchen_link()
    {
        return $this->hasMany(Kitchen_link::className(), ['restaurant' => 'id_rest']);
    }


}