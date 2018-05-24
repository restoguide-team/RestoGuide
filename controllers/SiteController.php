<?php

namespace app\controllers;

use app\models\CheckinUserForm;
use app\models\LinkForm;
use app\models\RegistrationUserForm;
use app\models\Resto;
use HttpException;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
       public function actionIndex()
        {
            $model=Resto::find()->joinWith('image')->all();
            $form = new LinkForm();

           if($form->load(Yii::$app->request->post()) && $form->validate()){

           }
            return $this->render('index', ['model'=>$model, 'form'=>$form ]);
        }



        public function actionLogin()
        {

            if (Yii::$app->request->isAjax)
            {
                $formlog = new Loginform();
                if ($formlog->load(Yii::$app->request->post()))
                {
                    if ($formlog->login())
                    {
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                    else {
                        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                        return \yii\widgets\ActiveForm::validate($formlog);
                    }
                }
            }
            else {
                throw new HttpException(404 ,'Page not found');
                 }
        }

        public function actionLogout()
        {
            Yii::$app->user->logout();

            return $this->redirect(Yii::$app->request->referrer);
        }



    public function actionCheckinuser()
    {
        $form = new RegistrationUserForm();
        if ($form->load(Yii::$app->request->post())){
            if ($form->validate())
            {
                $form->saveuser();
               // var_dump('успех');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->render('checkinuser', ['form'=>$form ]);
    }




}
