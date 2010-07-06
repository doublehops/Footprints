<?php
$this->breadcrumbs=array(
	'Invoice Sents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InvoiceSent', 'url'=>array('index')),
	array('label'=>'Create InvoiceSent', 'url'=>array('create')),
	array('label'=>'View InvoiceSent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InvoiceSent', 'url'=>array('admin')),
);
?>

<h1>Update InvoiceSent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>