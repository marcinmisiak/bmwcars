<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SamochodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Samochods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samochod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Samochod', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'model',
            'pojemnosc',
            'opis:ntext',
            'zdjecie1',
            // 'zdjecie2',
            // 'zdjecie3',
            // 'zdjecie4',
            // 'miniatura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
