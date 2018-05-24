<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 14.03.2018
 * Time: 18:47
 */

namespace app\controllers;


use app\models\BookingForm;
use app\models\Resto;
use app\models\User;
use yii\bootstrap\Modal;
use yii\web\Controller;
use Yii;
use HttpException;


class SearchController extends Controller
{
    public $restid = 0;
    //вывод всех ресторанов
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
            return $this->redirect(Yii::$app->request->referrer);
        }

    }

    //Вывод ресторанов по пренадлежности к кухне
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

    //Вывод всей информации о ресторане
    public function actionRestaurant()
    {

        if (isset($_GET['id'])){
            $this->restid = 2;
            $model=Resto::find()->joinWith('imageall')->where(['restaurant.id_rest'=>$_GET['id']])->andWhere(['imageall.restaurant'=>$_GET['id']])->all();
            return $this->render('restaurant', ['model'=>$model]);
        }
        else{
            return $this->redirect(Yii::$app->request->referrer);
        }

    }

    //Форма бронирования в модальном окне
    public function actionBooking()
    {
        if (Yii::$app->request->isAjax)
        {
                $form = new BookingForm();
                if ($form->load(Yii::$app->request->post()))
                {
                    //отправка сообщения
                    if ($form->validate())
                    {
                        $user = User::find()->where(['id_user' => Yii::$app->user->getId()])->one();
                        $rest = Resto::find()->where(['id_rest'=>$form->rest])->one();
                        $massege="Бронирование места в ресторане ".$rest->name
                            ."\nКлиент ".$user->name." ".$user->secondname
                            ."\nДата: ".$form->data
                            ."\nКоличество человек: ".$form->count
                            ."\nТелефон клиента: ".$user->phone;
                        mail('Bsn20000@yandex.ru', 'Restoguide', $massege);
                        alert( "Успех" );
                        return $this->redirect(Yii::$app->request->referrer);

                    }
                    else {
                        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                        return \yii\widgets\ActiveForm::validate($form);
                    }
                }
                else return 'данные не дошли до сервера';
        }
        else {
            throw new HttpException(404 ,'Page not found');
        }
    }

}