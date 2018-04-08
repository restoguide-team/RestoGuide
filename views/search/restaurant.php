<?php
/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 28.03.2018
 * Time: 16:30
 */

use yii\helpers\Html;


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
            <? endif;?>
            <div class="booking_but">
                <a href="">Забронировать</a>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
</main>