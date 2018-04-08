<?php
namespace app\models;
use yii\db\ActiveRecord;


class Image extends ActiveRecord
{
    public static function tableName()
    {
        return 'imagelogo';
    }

    public function getResto()
    {
        return $this->hasOne(Resto::className(), ['id_rest' => 'restaurant']);
    }

}