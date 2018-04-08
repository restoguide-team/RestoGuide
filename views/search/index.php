<?php

/**
 * Created by PhpStorm.
 * User: alexandrborovikov
 * Date: 14.03.2018
 * Time: 18:48
 */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = "restaurants"

?>

<main>
    <section class="top_line">
        <div class="top_line_ab">
            <h1>Поиск всех ресторанов!</h1>
        </div>
    </section>
    <section class="select_rest_search">
        <div class="select_rest_list">
            <ul>


                <?php foreach ($model as $mod): ?>
                <li>
                    <a href="<?=Url::toRoute(['search/restaurant', 'id'=>$mod['id_rest']]);?>">
                        <img src="img/restoran_logo/<?=$mod->image->img;?>.jpg" alt="">
                    </a>
                    <div class="select_rest_info">
                        <h5><?=$mod->name;?></h5>
                        <p class="cont_p">
                            <?=$mod->description;?>
                        </p>
                        <p>
                            <?=$mod->rating;?>
                        </p>
                        <p>
                            средний чек: <?=$mod->price;?>
                        </p>
                        <div class="booking_but">
                            <a href="">Забронировать</a>
                        </div>
                    </div>

                </li>
                <?php endforeach; ?>
        </ul>
        </div>
        <div class="button_more_rest">
            <a href="">
                следующая страница
            </a>
        </div>

    </section>
</main>