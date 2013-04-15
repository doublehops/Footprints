<?php
$this->breadcrumbs=array(
	'Invoice Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InvoicePayment', 'url'=>array('index')),
	array('label'=>'Manage InvoicePayment', 'url'=>array('admin')),
);
?>

<h1>Create InvoicePayment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>