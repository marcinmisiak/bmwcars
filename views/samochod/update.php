<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Samochod */

$this->title = 'Aktualizajca Samochód: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Samochody', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizacja';
?>
<div class="samochod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
