<?php
$this->breadcrumbs=array(
	'Expense Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ExpenseType', 'url'=>array('index')),
	array('label'=>'Create ExpenseType', 'url'=>array('create')),
	array('label'=>'Update ExpenseType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExpenseType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExpenseType', 'url'=>array('admin')),
);
?>

<h1>View ExpenseType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'businessId',
		'expenseName',
		'expenseDescription',
		'expenseCode',
		'created',
		'lastModified',
		'lastUpdatedBy',
		'active',
	),
)); ?>
