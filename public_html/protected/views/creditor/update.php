<?php
$this->breadcrumbs=array(
	'Creditors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Creditor', 'url'=>array('index')),
	array('label'=>'Create Creditor', 'url'=>array('create')),
	array('label'=>'View Creditor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Creditor', 'url'=>array('admin')),
);
?>

<h1>Update Creditor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'contactInfo'=>$contactInfo)); ?>