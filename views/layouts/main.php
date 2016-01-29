<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" sizes="16x16" href="<?php echo Yii::$app->request->baseUrl; ?>/grafika/indeks.png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/grafika/bmw-modules.png', ['alt'=>Yii::$app->name, 'class'=>'bmw-logo img-responsive']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
        		
            ['label' => 'Samochody od zaraz', 'url' => ['/samochod/lista']],
            ['label' => 'Kontakt', 'url' => ['/site/contact']],
        	['label'=>'Administracja Samochodami', 'url'=>['/samochod/index'] , 'visible'=>!Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ?
                ['label' => 'Zaloguj się', 'url' => ['/site/login']] :
                [
                    'label' => 'Wyloguj (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container container-tresc">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ZK Motors Kielce <?= date('Y') ?></p>

        <p class="pull-right">biuro@bmw-zkmotors.pl</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
