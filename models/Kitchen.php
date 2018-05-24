<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 17.03.2018
 * Time: 16:57
 */

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