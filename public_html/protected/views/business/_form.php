<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'businessName'); ?>
		<?php echo $form->textField($model,'businessName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'businessName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AssetPath'); ?>
		<?php echo $form->textField($model,'AssetPath',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'AssetPath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gstEnabled'); ?>
		<?php echo $form->textField($model,'gstEnabled'); ?>
		<?php echo $form->error($model,'gstEnabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gstRate'); ?>
		<?php echo $form->textField($model,'gstRate',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'gstRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timeOffset'); ?>
		<?php echo $form->textField($model,'timeOffset',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'timeOffset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastModified'); ?>
		<?php echo $form->textField($model,'lastModified'); ?>
		<?php echo $form->error($model,'lastModified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastUpdatedBy'); ?>
		<?php echo $form->textField($model,'lastUpdatedBy'); ?>
		<?php echo $form->error($model,'lastUpdatedBy'); ?>
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