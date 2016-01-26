<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SamochodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="samochod-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'pojemnosc') ?>

    <?= $form->field($model, 'opis') ?>

    <?= $form->field($model, 'zdjecie1') ?>

    <?php // echo $form->field($model, 'zdjecie2') ?>

    <?php // echo $form->field($model, 'zdjecie3') ?>

    <?php // echo $form->field($model, 'zdjecie4') ?>

    <?php // echo $form->field($model, 'miniatura') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
