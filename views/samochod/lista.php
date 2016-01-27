<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SamochodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Samochody od zaraz';
// $this->params['breadcrumbs'][] = $this->title;
?>

 <?= ListView::widget([
    'dataProvider' => $dataProvider,
 		'itemView' => '_view',
 		]); ?>
<?php 
foreach ($dataProvider->models as $model) {
?>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<a href="#" class="thumbnail">
	<?php echo Html::img('@web/uploads/'.$model->miniatura, ['height'=>170]); ?>
	</a>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
<?php echo "<h3>$model->model</h3>"; ?>
</div>
</div>
<?php } ?>

<div class="samochod-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
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
    ]); ?>

</div>
