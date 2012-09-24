<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expense-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseName'); ?>
		<?php echo $form->textField($model,'expenseName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'expenseName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseDescription'); ?>
		<?php echo $form->textArea($model,'expenseDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'expenseDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseCode'); ?>
		<?php echo $form->textField($model,'expenseCode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'expenseCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reportableExpense'); ?>
		<?php echo $form->checkbox($model,'reportableExpense'); ?>
		<?php echo $form->error($model,'reportableExpense'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkbox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
