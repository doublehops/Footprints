<?php
$this->breadcrumbs=array(
	'Expenses'=>array('index'),
);

$this->menu=array(
	array('label'=>'List Expense', 'url'=>array('index')),
	array('label'=>'Create Expense', 'url'=>array('create')),
	array('label'=>'Manage Expense', 'url'=>array('admin')),
);
?>

<h1>Calculate Expenses</h1>

<?php $this->widget('BasPeriodSelect'); ?>
<dl>
<?php foreach( $expenseArray as $expense ) : ?>
	<dt><?php echo CHtml::encode($expense['name']) ?></dt>
	<dl>$<?php echo CHtml::encode( number_format( $expense['total'], 2 ) ) ?></dl>

<?php endforeach ?>
</dl>