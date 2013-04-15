<?php
$this->breadcrumbs=array(
	'Expense Types',
);

$this->menu=array(
	array('label'=>'Create ExpenseType', 'url'=>array('create')),
	array('label'=>'Manage ExpenseType', 'url'=>array('admin')),
);
?>

<h1>Expense Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
