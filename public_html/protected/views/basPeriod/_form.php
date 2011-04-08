<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periodStart'); ?>
		<?php echo $form->textField($model,'periodStart'); ?>
		<?php echo $form->error($model,'periodStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periodEnd'); ?>
		<?php echo $form->textField($model,'periodEnd'); ?>
		<?php echo $form->error($model,'periodEnd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->