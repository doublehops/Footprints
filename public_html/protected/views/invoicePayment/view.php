<?php
$this->breadcrumbs=array(
	'Invoice Payments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InvoicePayment', 'url'=>array('index')),
	array('label'=>'Create InvoicePayment', 'url'=>array('create')),
	array('label'=>'Update InvoicePayment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InvoicePayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InvoicePayment', 'url'=>array('admin')),
);
?>

<h1>View InvoicePayment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'invoiceId',
		'amount',
		'paymentMethod',
		'paymentDate',
		'notes',
		'active',
		'created',
		'lastModified',
		'lastUpdatedBy',
	),
)); ?>
