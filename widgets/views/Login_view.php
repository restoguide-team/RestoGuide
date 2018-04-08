

<?php

use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php
    Modal::begin([
    'header'=>'<h4>Вход</h4>',
    'id'=>'login_modal'
    ]);
?>

    <?php $login = ActiveForm::begin([
        'id' => 'login_form',
        'options' => ['class' => 'loginform'],
        'enableAjaxValidation' => true,
        'action' => ['site/login']
    ]);?>

    <?= $login->field($formlog, 'login')->label('Введите логин'); ?>
    <?= $login->field($formlog, 'password')->passwordInput()->label('Введите пароль'); ?>

        <a href="<?=Url::toRoute('site/checkinuser');?>">зарегистрироваться</a>
            <?= Html::submitButton('Войти',['class' => 'btn send_form']) ?>

    <?php ActiveForm::end() ?>
<?php Modal::end(); ?>
