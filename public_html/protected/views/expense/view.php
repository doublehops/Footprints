<?php
$this->breadcrumbs=array(
	'Expenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Expense', 'url'=>array('index')),
	array('label'=>'Create Expense', 'url'=>array('create')),
	array('label'=>'Update Expense', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Expense', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Expense', 'url'=>array('admin')),
);
?>

<h1>View Expense #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'creditorId',
		'expenseName',
		'expenseDescription',
		'expenseType',
		array('name'=>'expenseType', 'type'=>'raw', 'value'=>Expense::getExpenseType($model["expenseType"], 'full')),
		'expenseTotal',
		'subjectGST',
		'expensePaid',
		'expensePaidDate',
		'created',
		'lastModified',
		'lastUpdatedBy',
		'active',
	),
)); ?>
