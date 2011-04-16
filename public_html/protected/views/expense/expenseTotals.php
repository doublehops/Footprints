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
<table class="totalsTable">
	<tr><th class="left">Expense name</th><th>Non-GST</th><th>Subject to GST</th><th>Total</th></tr>
<?php foreach( $expenseArray as $expense ) : ?>
	<tr>
		<td class="left"><?php echo CHtml::encode($expense['name']) ?></td>
		<td>$<?php echo CHtml::encode( number_format( $expense['nonGST'], 2 ) ) ?></td>
		<td>$<?php echo CHtml::encode( number_format( $expense['subjectGST'], 2 ) ) ?></td>
		<td>$<?php echo CHtml::encode( number_format( $expense['total'], 2 ) ) ?></td>
	</tr>
<?php endforeach ?>
	<tr class="totals">
		<td class="left">Totals</td>
		<td>$<?php echo CHtml::encode( number_format( $expenseTotals['nonGSTTotal'], 2 ) ) ?></td>
		<td>$<?php echo CHtml::encode( number_format( $expenseTotals['subjectGSTTotal'], 2 ) ) ?></td>
		<td>$<?php echo CHtml::encode( number_format( $expenseTotals['expenseTotal'], 2 ) ) ?></td>
	</tr>
</table>