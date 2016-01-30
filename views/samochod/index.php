<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SamochodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Samochody';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samochod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nowy Samochód', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'model',
            'rocznik',
            'pojemnosc',
            'cena',
            // 'zdjecie1',
            // 'zdjecie2',
            // 'zdjecie3',
            // 'zdjecie4',
             ['attribute'=> 'miniatura' , 'format'=>'html', 'value'=> function ($data) { return Html::img('@web/uploads/'.$data->miniatura, ['height'=>100]); } ],
            // 'opis:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
