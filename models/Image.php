<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 16.03.2018
 * Time: 11:59
 */

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