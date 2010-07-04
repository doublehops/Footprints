<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pId'); ?>
		<?php echo $form->textField($model,'pId'); ?>
		<?php echo $form->error($model,'pId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailAddress1'); ?>
		<?php echo $form->textField($model,'mailAddress1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mailAddress1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MailAddress2'); ?>
		<?php echo $form->textField($model,'MailAddress2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'MailAddress2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailCity'); ?>
		<?php echo $form->textField($model,'mailCity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mailCity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailState'); ?>
		<?php echo $form->textField($model,'mailState',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mailState'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailPostcode'); ?>
		<?php echo $form->textField($model,'mailPostcode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'mailPostcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abn'); ?>
		<?php echo $form->textField($model,'abn',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'abn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactName'); ?>
		<?php echo $form->textField($model,'contactName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contactName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactNumber'); ?>
		<?php echo $form->textField($model,'contactNumber',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'contactNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactMobile'); ?>
		<?php echo $form->textField($model,'contactMobile',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'contactMobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactFax'); ?>
		<?php echo $form->textField($model,'contactFax',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'contactFax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactEmail'); ?>
		<?php echo $form->textField($model,'contactEmail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contactEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accountEmail'); ?>
		<?php echo $form->textField($model,'accountEmail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'accountEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->