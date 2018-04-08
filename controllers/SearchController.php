<?php

namespace app\controllers;


use app\models\Resto;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex()
    {
        $model=Resto::find()->With('image')->all();

        return $this->render('index', ['model'=>$model]);
    }



    public function actionListname()
    {

        if (isset($_GET['id'])){
            $model=Resto::find()->With('image')->where(['restaurant.id_rest'=>$_GET['id']])->all();
            //->andWhere(['city_id' => $city_id])
            return $this->render('index', ['model'=>$model]);
        }
        else{
            return $this->goBack();
        }

    }

    public function actionListkitchen()
    {
        if (isset($_GET['id'])){
            $model=Resto::find()->joinWith(['kitchen_link', 'image'])
               ->where(['kitchen_link.kitchen'=>$_GET['id']])->limit(12)->all();
            return $this->render('index', ['model'=>$model]);
        }
        else{
            echo ujsdfk;
        }
    }

    public function actionRestaurant()
    {

        if (isset($_GET['id'])){
            $model=Resto::find()->joinWith('imageall')->where(['restaurant.id_rest'=>$_GET['id']])->andWhere(['imageall.restaurant'=>$_GET['id']])->all();


            return $this->render('restaurant', ['model'=>$model]);
        }
        else{
            return $this->goBack();
        }

    }

}