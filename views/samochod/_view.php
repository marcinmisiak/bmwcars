<?php 

use yii\helpers\Html;

?>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<a href="#" class="thumbnail">
	<?php echo Html::img('@web/uploads/'.$model->miniatura, ['height'=>170]); ?>
	</a>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
		<h3><?= $model->model ?></h3>
		<P>Rocznik: <?= $model->rocznik ?>
		<br>Pojemność silnika: <?= $model->pojemnosc ?>
		<br>Cena: <?= Yii::$app->formatter->asInteger($model->cena) ?>
		<br><?= Html::a("Więcej szczegółów", ['samochod/szczegoly','id'=>$model->id]) ?>
		<br><?= Html::a("Zapytaj o ofertę", ['samochod/zapytaj','id'=>$model->id]) ?>
		</P>

</div>
</div>

