<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SamochodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Samochody od zaraz';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <?php $form = ActiveForm::begin(['method'=>'get']); ?>
<div class="col-lg-3">
    <?= $form->field($searchModel, 'model') ?>
</div>
<div class="col-lg-3">
    <?= $form->field($searchModel, 'rocznik') ?>
</div>
<div class="col-lg-3">
    <?= $form->field($searchModel, 'pojemnosc') ?>
</div>


   <div class="col-lg-3">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-success btnSzukaj']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


<div class="row">
 <?= ListView::widget([
    'dataProvider' => $dataProvider,
 		
 		'itemView' => '_view',
 		'layout' => "<div class='sortowanie'>{sorter}</div><div class='row'>{items}</div><div class='row'>\n</div>\n<div class='row'>{pager}</div>",
 		'sorter' =>[
 				
 						'class' => 'rsr\yii2\ButtonDropdownSorter',
 						'label' => 'Sortuj po',
 				
 				
 				'attributes'=>['rocznik', 'cena', 'pojemnosc'],
 				// 'options'=>['class'=>'sorter ', 				 		'triggerTemplate '=> '<div class="row ias-trigger" style="text-align: center; cursor: pointer;"><a>{text}</a></div>', ]
 				
 		],
 		'pager' => ['class' => \kop\y2sp\ScrollPager::className()],
 	//	'summaryOptions' =>['class'=>'row pull-right'],
 		'itemOptions' => ['class' => 'item'],
 		]); ?>
</div>



<div class="samochod-index">

   
   


    <?php 
    
   /*   
  echo    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         
        		['attribute'=> 'miniatura', 'filter'=>'', 'header'=>"" , 'format'=>'html', 'value'=> function ($data) { return Html::img('@web/uploads/'.$data->miniatura, ['height'=>100]); } ],
        		
            
            'model',
            'rocznik',
            'pojemnosc',
            'cena',
            // 'zdjecie1',
            // 'zdjecie2',
            // 'zdjecie3',
            // 'zdjecie4',
                       // 'opis:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    */
     ?>

</div>
