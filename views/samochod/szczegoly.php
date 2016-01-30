<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $model app\models\Samochod */

$this->title = $model->model;
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Samochody od zaraz',
		'url' => [ 
				'samochod/lista' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;

?>
<?php 
echo newerton\fancybox\FancyBox::widget([
		'target' => 'a[rel=fancybox]',
		'helpers' => true,
		'mouse' => true,
		'config' => [
				'maxWidth' => '100%',
				'maxHeight' => '100%',
				'playSpeed' => 7000,
				'padding' => 3,
				'fitToView' => false,
				'width' => '90%',
				'height' => '90%',
				'autoSize' => true,
				'closeClick' => false,
				'openEffect' => 'elastic',
				'closeEffect' => 'elastic',
				'prevEffect' => 'elastic',
				'nextEffect' => 'elastic',
				'closeBtn' => true,
				'openOpacity' => false,
				'helpers' => [
						'title' => ['type' => 'float'],
					//	'buttons' => [],
						//'thumbs' => ['width' => 68, 'height' => 50],
						'overlay' => [
								'css' => [
										'background' => 'rgba(0, 0, 0, 0.8)'
								]
						]
				],
		]
]);
?>
 
<?php
/* slide show
$items = [ ];
if (! empty ( $model->zdjecie1 ))
	$items [] = Html::img ( '@web/uploads/' . $model->zdjecie1, ['height'=>150] );
if (! empty ( $model->zdjecie2 ))
	$items [] = Html::img ( '@web/uploads/' . $model->zdjecie2, ['height'=>150]  );
if (! empty ( $model->zdjecie3 ))
	$items [] = Html::img ( '@web/uploads/' . $model->zdjecie3, ['height'=>150]  );
if (! empty ( $model->zdjecie4 ))
	$items [] = Html::img ( '@web/uploads/' . $model->zdjecie4, ['height'=>150]  );
echo Carousel::widget ( [ 
		'items' => $items,
		
] );
*/
?>
<div class="row">
<?php 

if (! empty ( $model->zdjecie1 ))
	echo  "<div class=\"col-sm-3 thumbnail\">". Html::a(Html::img ( '@web/uploads/thumb_' . $model->zdjecie1), '@web/uploads/'. $model->zdjecie1, ['rel' => 'fancybox']) . "</div>";
if (! empty ( $model->zdjecie2 ))
	echo "<div class=\"col-sm-3 thumbnail\">". Html::a(Html::img ( '@web/uploads/thumb_' . $model->zdjecie2), '@web/uploads/'. $model->zdjecie2, ['rel' => 'fancybox']). "</div>";
		if (! empty ( $model->zdjecie3 ))
			echo "<div class=\"col-sm-3 thumbnail\">". Html::a(Html::img ( '@web/uploads/thumb_' . $model->zdjecie3), '@web/uploads/'. $model->zdjecie3, ['rel' => 'fancybox']). "</div>";
			if (! empty ( $model->zdjecie4 ))
				echo "<div class=\"col-sm-3 thumbnail\">". Html::a(Html::img ( '@web/uploads/thumb_' . $model->zdjecie4), '@web/uploads/'. $model->zdjecie4, ['rel' => 'fancybox']). "</div>";

?>
</div>
<div class="row">
		<div class='col-lg-4'>
			<div class="thumbnail">
			<div class="center-block"><h3 style="text-align:center"><?= Html::encode($model->model) ?></h3></div>
			<div class="caption">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Rocznik:</th>
						<td><?= $model->rocznik ?></td>
					
					
					<tr>
						<th>Przebieg:</th>
						<td><?= $model->przebieg ?></td>
					
					
					<tr>
						<th>Pojemność silnika:</th>
						<td><?= $model->pojemnosc ?></td>
					
					
					<tr>
						<th>Cena w PLN:</th>
						<td><?= Yii::$app->formatter->asInteger($model->cena) ?></td>
				
				</tbody>
			</table>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
		<div class="thumbnail">
<?= Yii::$app->formatter->asHtml($model->opis)?>
</div>
</div>
	</div>
	