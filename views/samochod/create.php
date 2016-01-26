<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Samochod */

$this->title = 'Create Samochod';
$this->params['breadcrumbs'][] = ['label' => 'Samochods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samochod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
