<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Samochod */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Samochody', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="samochod-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Zmień', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'model',
            'rocznik',
            'pojemnosc',
            'cena',
        		[ 'attribute'=> 'miniatura', 'format' => "html", 'value'=>Html::img('@web/uploads/'.$model->miniatura, ['height'=>100]) ] ,
           [ 'attribute'=> 'zdjecie1', 'format' => "html", 'value'=>Html::img('@web/uploads/'.$model->zdjecie1, ['height'=>150]) ] ,
        		[ 'attribute'=> 'zdjecie2', 'format' => "html", 'value'=>Html::img('@web/uploads/'.$model->zdjecie2, ['height'=>150])   
        				. Html::a("",['samochod/deletepicture','id'=>$model->id, 'plik'=>'zdjecie2'], 
        						[
        						'class' => 'glyphicon glyphicon-trash pull-right',
           	 					'data' => [
              						  'confirm' => "Are you sure you want to delete profile?",
              							'method' => 'post',
           							 ],
        						]
        						)
       		 ],
        		[ 'attribute'=> 'zdjecie3', 'format' => "html", 'value'=>Html::img('@web/uploads/'.$model->zdjecie3, ['height'=>150]) 
        				. Html::a("",['samochod/deletepicture','id'=>$model->id, 'plik'=>'zdjecie3'],
        						[
        								'class' => 'glyphicon glyphicon-trash pull-right',
        								'data' => [
        										'confirm' => "Are you sure you want to delete profile?",
        										'method' => 'post',
        								],
        						]
        						)
        		] ,
        		[ 'attribute'=> 'zdjecie4', 'format' => "html", 'value'=>Html::img('@web/uploads/'.$model->zdjecie4, ['height'=>150])
        				. Html::a("",['samochod/deletepicture','id'=>$model->id, 'plik'=>'zdjecie4'],
        						[
        								'class' => 'glyphicon glyphicon-trash pull-right',
        								'data' => [
        										'confirm' => "Are you sure you want to delete profile?",
        										'method' => 'post',
        								],
        						]
        						)
        		] ,
        		
            
            'opis:html',
        ],
    ]) ?>

</div>
