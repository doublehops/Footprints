<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'jobName'); ?>
		<?php echo $form->textField($model,'jobName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'jobName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobDescription'); ?>
		<?php echo $form->textArea($model,'jobDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'jobDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobRate'); ?>
		<?php echo $form->textField($model,'jobRate',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'jobRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobCode'); ?>
		<?php echo $form->textField($model,'jobCode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'jobCode'); ?>
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