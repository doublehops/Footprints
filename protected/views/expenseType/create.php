<?php
$this->breadcrumbs=array(
	'Expense Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExpenseType', 'url'=>array('index')),
	array('label'=>'Manage ExpenseType', 'url'=>array('admin')),
);
?>

<h1>Create ExpenseType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>