<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 17.03.2018
 * Time: 16:58
 */

namespace app\models;
use yii\db\ActiveRecord;

class Kitchen_link extends ActiveRecord
{
    public static function tableName()
    {
        return 'kitchen_link';
    }

    public function getResto()
    {
        return $this->hasOne(Resto::className(), ['id_rest' => 'restaurant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKitchen()
    {
        return $this->hasOne(Kitchen::className(), ['id_kitchen' => 'kitchen']);
    }

}