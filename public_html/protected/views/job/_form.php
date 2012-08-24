<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'invoiceId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobName'); ?>
		<?php echo $form->textField($model,'jobName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'jobName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobDescription'); ?>
		<?php echo $form->textField($model,'jobDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jobDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobTypeId'); ?>
		<?php echo $form->dropDownList($model,'jobTypeId', CHtml::listData(JobType::model()->findAll() , 'id', 'jobName') ); ?>
		<?php echo $form->error($model,'jobTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobRate'); ?>
		<?php echo $form->textField($model,'jobRate',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'jobRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobQuantity'); ?>
		<?php echo $form->textField($model,'jobQuantity',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'jobQuantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobNotes'); ?>
		<?php echo $form->textArea($model,'jobNotes',array('rows'=>3, 'cols'=>80)); ?>
		<?php echo $form->error($model,'jobNotes'); ?>
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
