<?php
$this->breadcrumbs=array(
	'Invoice Sents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InvoiceSent', 'url'=>array('index')),
	array('label'=>'Manage InvoiceSent', 'url'=>array('admin')),
);
?>

<h1>Create InvoiceSent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>