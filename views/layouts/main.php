<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Login_wid;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?= (Yii::$app->user->isGuest ? Login_wid::widget([]) : ''); ?>



<div class="main_container">
    <header>
        <div class="logo">
            <a href="<?=Url::toRoute('site/index');?>"><font color="black">Resto</font>Guide</a>
        </div>
        <div class="entry_tel">
            <div class="telefone">
                <a href="tel:+79602829506"><i class="fa fa-phone"></i>+7(960)282-95-06</a>
            </div>
            <div class="entry">
                <?php if (Yii::$app->user->isGuest) : ?>
                    <a data-toggle="modal" , data-target ='#login_modal', href="#">Вход / Регистрация</a>
                <?php else : ?>
                <?=
                    Html::beginForm(['site/logout'], 'post')
                    . Html::submitButton
                    (
                        Yii::$app->user->identity->login . ' / Выход',  ['class' => 'logout']
                    )
                    . Html::endForm()
                    ?>

                 <?php  endif; ?>

            </div>
        </div>


    </header>

    <?=$content;?>

    <footer>
        <ul>
            <li>
                <a href="">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fab fa-vk"></i>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        </ul>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
