<?php
$this->breadcrumbs=array(
	'Creditors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Creditor', 'url'=>array('index')),
	array('label'=>'Manage Creditor', 'url'=>array('admin')),
);
?>

<h1>Create Creditor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'contactInfo'=>$contactInfo)); ?>