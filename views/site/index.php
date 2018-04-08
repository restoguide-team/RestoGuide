<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "restoguide"

?>


<main>
    <section class="slaid">
        <div class="search_line">
            <p>найдите свой<br>столик!</p>
            <form action=" ", method="POST">
                <input type="text" name="restoran" required="required" size="50" placeholder="Поиск по названию">
                <input type="submit" name="send" value="Найти">
            </form>
        </div>
        <div class="slide_block">
            <div>
                <img src="img/main_slide/slide_1.jpg" alt="1">
                <div class="slide_text">
                    <h4>Более 50 ресторанов!</h4>
                </div>
            </div>
            <div>
                <img src="img/main_slide/slide_2.jpg" alt="2">
                <div class="slide_text">
                    <h4>Быстрое бронирование!</h4>
                </div>
            </div>
            <div>
                <img src="img/main_slide/slide_3.jpg" alt="3">
                <div class="slide_text">
                    <h4>Качественно и надежно!</h4>
                </div>
            </div>

        </div>
    </section>
    <section class="pop">
        <h3>Популярные места</h3>
        <div class="sign">
            <p>В Санкт-Петербурге</p>
        </div>
        <div class="pop_list">



            <?php foreach ($model as $mod): ?>
                <div class="pop_list_el">
                    <a href="<?=Url::toRoute(['search/restaurant', 'id'=>$mod['id_rest']]);?>">
                        <img src="img/restoran_logo/<?=$mod->image->img;?>.jpg" alt="">
                        <div class="pop_list_text">
                            <h5><?=$mod->name;?></h5>
                            <p><?=$mod->description;?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>




        </div>
    </section>
    <section class="select_rest">
        <h3>выберите свой ресторан</h3>
        <div class="sign">
            <p>на вкус и цвет</p>
        </div>
        <div class="select_rest_list">
            <ul>
                <?php foreach ($model as $mod): ?>
                <li>
                    <a href="<?=Url::toRoute(['search/restaurant', 'id'=>$mod['id_rest']]);?>">
                        <img src="img/restoran_logo/<?=$mod->image->img;?>.jpg" alt="">
                        <div class="select_rest_more">
                            <h5><?=$mod->name;?></h5>
                            <p>
                                <?=$mod->description;?>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="button_more_rest">
            <a href="<?=Url::toRoute('search/index');?>">
                больше ресторанов
            </a>
        </div>
    </section>
    <section class="kitchen">
        <h3>Выберите кухню</h3>
        <div class="sign sign_margine">
            <p>какую хотите)</p>
        </div>
        <div class="kitchen_conteiner">
            <div class="kitchen_left">
                <div class="kitchen_text kitchen_text_left">
                    <ul>
                        <li>
                            <h4>русская кухня</h4>
                        </li>
                        <li>
                            <h4>европейская кухня</h4>
                        </li>
                        <li>
                            <h4>итальянская кухня</h4>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="kitchen_center">
                <ul>
                    <li>
                        <a href="<?=Url::toRoute(['search/listkitchen', 'id'=>1]);?>">
                            <img src="img/kitchen/russian_food.jpg" alt=""></a>
                        <div class="vert"></div>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['search/listkitchen', 'id'=>2]);?>">
                            <img src="img/kitchen/china_food.jpg" alt=""></a>
                        <div class="vert"></div>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['search/listkitchen', 'id'=>3]);?>">
                            <img src="img/kitchen/erope_food.jpg" alt=""></a>
                        <div class="vert"></div>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['search/listkitchen', 'id'=>4]);?>">
                            <img src="img/kitchen/japon_food.jpg" alt=""></a>
                        <div class="vert"></div>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['search/listkitchen', 'id'=>5]);?>">
                            <img src="img/kitchen/italian_food.jpg" alt=""></a>
                        <div class="vert"></div>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['search/listkitchen', 'id'=>6]);?>">
                            <img src="img/kitchen/gorgia_food.jpg" alt=""></a>
                    </li>
                </ul>
            </div>
            <div class="kitchen_right">
                <div class="kitchen_text kitchen_text_right">
                    <ul>
                        <li>
                            <h4>китайская кухня</h4>
                        </li>
                        <li>
                            <h4>японская кухня</h4>
                        </li>
                        <li>
                            <h4>грузинская кухня</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
<section class="contact" id="contact">
    <h3>Свяжитесь с нами</h3>
    <div class="tel">
        <a href="tel:+79602829506">+7(960)282-95-06</a>
    </div>

    <?php
    $link = ActiveForm::begin([
    'id' => 'link_form',
    'options' => ['class' => 'contact_form'],
    ]) ;?>
    <?= $link->field($form, 'username')->label('Введите имя'); ?>
    <?= $link->field($form, 'tel')->label('Введите телефон'); ?>
    <?= $link->field($form, 'email')->label('Введите e-mail');?>
    <?= $link->field($form, 'text')->textarea(['rows' => '6'])->label('Введите сообщение'); ?>

    <div class="send">
        <?= Html::submitButton('Отправить',['class' => 'send_in']) ?>
    </div>
    <?php ActiveForm::end() ?>
</section>
<section class="map">
    <h3>найдите ближайший ресторан</h3>
    <div class="sign">
        <p>самый близкий</p>
    </div>
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afedbab9153a37bf163bcdc0fa339d8712b4ea2ff1803ac0c782cb994b264bd87&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
</section>
</main>
