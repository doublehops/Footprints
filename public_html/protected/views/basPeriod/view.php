<?php
$this->breadcrumbs=array(
	'Bas Periods'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List BasPeriod', 'url'=>array('index')),
	array('label'=>'Create BasPeriod', 'url'=>array('create')),
	array('label'=>'Update BasPeriod', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BasPeriod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasPeriod', 'url'=>array('admin')),
);
?>

<h1>View BasPeriod #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'periodStart',
		'periodEnd',
	),
)); ?>
