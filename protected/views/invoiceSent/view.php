<?php
$this->breadcrumbs=array(
	'Invoice Sents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InvoiceSent', 'url'=>array('index')),
	array('label'=>'Create InvoiceSent', 'url'=>array('create')),
	array('label'=>'Update InvoiceSent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InvoiceSent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InvoiceSent', 'url'=>array('admin')),
);
?>

<h1>View InvoiceSent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'invoiceId',
		'method',
		'sentTime',
		'sentTo',
		'notes',
		'active',
	),
)); ?>
