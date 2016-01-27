<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
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

