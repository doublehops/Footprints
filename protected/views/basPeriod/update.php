<?php
$this->breadcrumbs=array(
	'Bas Periods'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BasPeriod', 'url'=>array('index')),
	array('label'=>'Create BasPeriod', 'url'=>array('create')),
	array('label'=>'View BasPeriod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BasPeriod', 'url'=>array('admin')),
);
?>

<h1>Update BasPeriod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>