<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-sent-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'invoiceId'); ?>
		<?php echo $form->textField($model,'invoiceId'); ?>
		<?php echo $form->error($model,'invoiceId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'method'); ?>
		<?php echo $form->textField($model,'method',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sentTime'); ?>
		<?php echo $form->textField($model,'sentTime'); ?>
		<?php echo $form->error($model,'sentTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sentTo'); ?>
		<?php echo $form->textField($model,'sentTo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sentTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->