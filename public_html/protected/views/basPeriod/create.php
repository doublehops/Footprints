<?php
$this->breadcrumbs=array(
	'Bas Periods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BasPeriod', 'url'=>array('index')),
	array('label'=>'Manage BasPeriod', 'url'=>array('admin')),
);
?>

<h1>Create BasPeriod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>