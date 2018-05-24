<?php

use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?php
Modal::begin([
    'header'=>'<h4>Бронирование</h4>',
    'id'=>'booking_modal'
]);
?>
    <?php $login = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'action' => ['search/booking']
    ]);?>

        <?

        if (!Yii::$app->user->isGuest) {
            echo $login->field($form, 'rest')->hiddenInput(['value' => $id])->label(false);
            echo $login->field($form, 'data')->label('Введите дату')
                ->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99.99.9999']);
            echo $login->field($form, 'count')->label('Введите количество человек');
            echo Html::submitButton('Забронировать', ['class' => 'btn send_form']);
            }
        else {
            ?>
                <p>
                    Необходимо зарегистрироваться или войти в систему для бронирования.
                </p>
            <?
        }
            ?>

    <?php ActiveForm::end() ?>
<?php Modal::end(); ?>
