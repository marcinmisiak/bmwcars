<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Samochod */

$this->title = 'Nowy Samochód';
$this->params['breadcrumbs'][] = ['label' => 'Samochody', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samochod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
