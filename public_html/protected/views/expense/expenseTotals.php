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

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm'); ?>
    
    <?php echo $form->errorSummary($basPeriod); ?>
    
    <div class="row">
        <?php echo $form->label($basPeriod, 'title'); ?>
        <?php echo $form->dropDownList($basPeriod, 'title', CHtml::listData(BasPeriod::model()->findAll(), 'id', 'title')); ?> 
    </div>

	<div class="row">
		<?php echo $form->labelEx($basPeriod,'reportableOnly'); ?>
		<?php echo $form->checkbox($basPeriod,'reportableOnly'); ?>
		<?php echo $form->error($basPeriod,'reportableOnly'); ?>
	</div>

    <div class="row submit">
            <?php echo CHtml::submitButton('Submit'); ?>
     </div>
     
    <?php $this->endWidget(); ?>
</div>

<h1>Calculate Expenses</h1>

<table class="totalsTable">
	<tr><th class="left">Expense name</th><th>Non-GST</th><th>Subject to GST</th><th>Total</th></tr>
<?php foreach( $expenseArray as $expense ) : ?>
	<tr class="<?php echo $expense['class'] ?>">
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

<p>Capital purchases: <strong>$<?php echo CHtml::encode( number_format( $expenseTotals['capitalPurchases'], 2 ) ) ?></strong> (GST Ex)<br />
Capital purchases: <strong>$<?php echo CHtml::encode( number_format( $expenseTotals['capitalPurchasesGST'], 2 ) ) ?></strong> (GST Inc)</p>

<h1>Payment data</h1>
<table>
    <tr><td>Invoice</td><td>Amount</td></tr>
    <?php foreach($paymentValues['payments'] as $payment ) : ?>
    <tr><td><?php echo CHtml::link($payment->invoiceId, array('invoice/view', 'id'=>$payment->invoiceId)) ?></td><td>$<?php echo number_format($payment->amount, 2) ?></td></tr>
    <?php endforeach ?>
</table>

<p>Total payments received: $<strong><?php echo number_format($paymentValues['total'], 2) ?></strong></p>
