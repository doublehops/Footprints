<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-extended-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uId'); ?>
		<?php echo $form->textField($model,'uId'); ?>
		<?php echo $form->error($model,'uId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currentBusinessId'); ?>
		<?php echo $form->textField($model,'currentBusinessId'); ?>
		<?php echo $form->error($model,'currentBusinessId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timeOffset'); ?>
		<?php echo $form->textField($model,'timeOffset',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'timeOffset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastModified'); ?>
		<?php echo $form->textField($model,'lastModified'); ?>
		<?php echo $form->error($model,'lastModified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->