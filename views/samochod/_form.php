<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Samochod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="samochod-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rocznik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pojemnosc')->textInput() ?>
    <?= $form->field($model, 'przebieg')->textInput() ?>

    <?= $form->field($model, 'cena')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'opis')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ]) ?>
    
<?php // $form->field($model, 'plikMiniatura')->fileInput(['multiple' => false, 'accept' => 'image/*']); ?>
<?php 
if (empty($model->miniatura)) {
echo $form->field($model, 'plikMiniatura')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
]);
} else {
	echo $form->field($model, 'plikMiniatura')->widget(FileInput::classname(), [
			'name' => 'plikMiniatura',
			'options'=>[
					'multiple'=>false
			],
			'pluginOptions' => [
					'initialPreview'=>[
							// Html::img("/images/moon.jpg", ['class'=>'file-preview-image', 'alt'=>'The Moon', 'title'=>'The Moon']),
							Html::img('@web/uploads/'.$model->miniatura, ['class'=>'file-preview-image',])
					],
					'initialCaption'=>"Miniatura",
					'overwriteInitial'=>true
			]
	]);
}
if (empty($model->zdjecie1)) {
echo $form->field($model, 'zdjecia[]')->widget(FileInput::classname(), [
		'options' => [ 'multiple'=>true, 'accept' => 'image/*'],
]);
} else {
	echo $form->field($model, 'zdjecia[]')->widget(FileInput::classname(), [
			'options' => [ 'multiple'=>true, 'accept' => 'image/*'],
			'pluginOptions' => [
					'initialPreview'=>[
							// Html::img("/images/moon.jpg", ['class'=>'file-preview-image', 'alt'=>'The Moon', 'title'=>'The Moon']),
							Html::img('@web/uploads/'.$model->zdjecie1, ['class'=>'file-preview-image',]),
							Html::img('@web/uploads/'.$model->zdjecie2, ['class'=>'file-preview-image',]),
							Html::img('@web/uploads/'.$model->zdjecie3, ['class'=>'file-preview-image',]),
							Html::img('@web/uploads/'.$model->zdjecie4, ['class'=>'file-preview-image',]),
					],
					'initialCaption'=>"Zdjecia",
					'overwriteInitial'=>false
			]
	]);
}
?>
<?php // $form->field($model, 'zdjecia[]')->fileInput(['multiple' => true, 'accept' => 'image/*']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zmień', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
