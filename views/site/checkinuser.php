<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = "checkinuser"

?>

<main>
    <section class="top_line">
        <div class="top_line_ab">
            <h1>Регистрация</h1>
        </div>
    </section>
    <section class="check_form_cont">
        <?php $reg = ActiveForm::begin([
            'options' => ['class' => 'check_form'],
            'action' => ['site/checkinuser']
        ]);?>
            <?= $reg->field($form, 'name')->label('Имя'); ?>
            <?= $reg->field($form, 'secondname')->label('Фамилия'); ?>
            <?= $reg->field($form, 'phone')->label('Телефон'); ?>
            <?= $reg->field($form, 'login')->label('Логин (действующий e-mail)'); ?>
            <?= $reg->field($form, 'password')->passwordInput()->label('Пароль'); ?>

            <?= Html::submitButton('регистрация',['class' => 'btn send_form']) ?>

        <?php ActiveForm::end() ?>

    </section>

</main>