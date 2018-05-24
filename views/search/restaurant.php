<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 28.03.2018
 * Time: 16:30
 */

use app\models\BookingForm;
use app\widgets\ButBooking_wid;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "restaurant"
?>

<main>
    <section class="top_line">
        <?php foreach ($model as $mod): ?>
        <div class="top_line_ab">
            <h1><?=$mod->name?></h1>
        </div>
    </section>
    <section class="rest_one">
        <div class="slide_rest_one">
            <?php foreach ($mod->imageall as $image): ?>
                <div>
                    <img src="img/main_img/<?=$image->img;?>.jpg" alt="">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="rest_one_info">
            <ul>
                <? if($mod->phone):?>
                    <li>
                          <?=$mod->phone;?>
                    </li>
                <? endif;?>
                <?  if($mod->rating):?>
                    <li>
                        <?='Рейтинг: '.$mod->rating;?>
                    </li>
                <? endif;?>
                <? if($mod->price):?>
                    <li>
                            <?='средний чек: '.$mod->price.' руб';?>
                    </li>
                <? endif;?>
                <? if($mod->adress):?>
                    <li>
                            <?=$mod->adress;?>
                    </li>
                <? endif;?>
            </ul>
            <? if($mod->about_more):?>
                <p>
                    <?=$mod->about_more;?>
                </p>
            <? endif;
            ?>
            <?= ButBooking_wid::widget(['id'=>$mod->id_rest]); ?>
            <div class="booking_but">
                <a data-toggle="modal" , data-target ='#booking_modal', href="#">Забронировать</a>
            </div>
        </div>
            <?php $bok = ActiveForm::begin([
                'enableAjaxValidation' => true,
                'action' => ['search/booking'],
                'options' => ['class' => 'booking_form'],
            ]);?>
            <?
                $form = new BookingForm(); ?>
                <h4>Забронировать место в ресторане <?=$mod->name?></h4>
            <?
                echo $bok->field($form, 'rest')->hiddenInput(['value' => $mod->id_rest])->label(false);
                echo $bok->field($form, 'data')->label('Введите дату')
                    ->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '99-99-9999',
                    ]);
                echo $bok->field($form, 'count')->label('Введите количество человек');
                echo Html::submitButton('Забронировать', ['class' => 'btn send_form']);
             ?>
            <?php ActiveForm::end() ?>
        <?php endforeach; ?>
    </section>

</main>