<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'address1'); ?>
		<?php echo $form->textField($contactInfo,'address1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($contactInfo,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'address2'); ?>
		<?php echo $form->textField($contactInfo,'address2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($contactInfo,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'city'); ?>
		<?php echo $form->textField($contactInfo,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($contactInfo,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'state'); ?>
		<?php echo $form->textField($contactInfo,'state',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($contactInfo,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'postcode'); ?>
		<?php echo $form->textField($contactInfo,'postcode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($contactInfo,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'mailAddress1'); ?>
		<?php echo $form->textField($contactInfo,'mailAddress1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($contactInfo,'mailAddress1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'MailAddress2'); ?>
		<?php echo $form->textField($contactInfo,'MailAddress2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($contactInfo,'MailAddress2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'mailCity'); ?>
		<?php echo $form->textField($contactInfo,'mailCity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($contactInfo,'mailCity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'mailState'); ?>
		<?php echo $form->textField($contactInfo,'mailState',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($contactInfo,'mailState'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'mailPostcode'); ?>
		<?php echo $form->textField($contactInfo,'mailPostcode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($contactInfo,'mailPostcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'abn'); ?>
		<?php echo $form->textField($contactInfo,'abn',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($contactInfo,'abn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'contactName'); ?>
		<?php echo $form->textField($contactInfo,'contactName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($contactInfo,'contactName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'contactNumber'); ?>
		<?php echo $form->textField($contactInfo,'contactNumber',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($contactInfo,'contactNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'contactMobile'); ?>
		<?php echo $form->textField($contactInfo,'contactMobile',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($contactInfo,'contactMobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'contactFax'); ?>
		<?php echo $form->textField($contactInfo,'contactFax',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($contactInfo,'contactFax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'contactEmail'); ?>
		<?php echo $form->textField($contactInfo,'contactEmail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($contactInfo,'contactEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'accountEmail'); ?>
		<?php echo $form->textField($contactInfo,'accountEmail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($contactInfo,'accountEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contactInfo,'notes'); ?>
		<?php echo $form->textArea($contactInfo,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($contactInfo,'notes'); ?>
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