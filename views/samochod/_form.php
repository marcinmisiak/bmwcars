<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Samochod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="samochod-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pojemnosc')->textInput() ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>
 <?= $form->field($model, 'plikMiniatura')->fileInput(['multiple' => false, 'accept' => 'image/*']); ?>

<?= $form->field($model, 'zdjecia[]')->fileInput(['multiple' => true, 'accept' => 'image/*']); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zmień', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
