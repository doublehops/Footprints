<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Invoice', 'url'=>array('index')),
	array('label'=>'Create Invoice', 'url'=>array('create')),
	array('label'=>'Update Invoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Invoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Invoice', 'url'=>array('admin')),
	array('label'=>'Extended View', 'url'=>array('invoiceView', 'id'=>$model->id)),
	array('label'=>'Create Job', 'url'=>array('job/create', 'iid'=>$model->id)),
);
?>

<h1>View Invoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'clientId',
		'invoiceDate',
		'dueDate',
		'invoiceTotal',
		'clientNotes',
		'invoiceNotes',
		'status',
		'active',
		'created',
		'lastModified',
		'lastUpdatedBy',
	),
)); ?>
