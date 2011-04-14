<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-payment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paymentMethod'); ?>
		<?php echo $form->dropDownList($model,'paymentMethod', CHtml::listData(PaymentMethod::model()->findAll() , 'id', 'name') ); ?>
		<?php echo $form->error($model,'paymentMethod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paymentDate'); ?>
		<?php echo $form->textField($model,'paymentDate'); ?>
		<?php echo $form->error($model,'paymentDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>3, 'cols'=>80)); ?>
		<?php echo $form->error($model,'notes'); ?>
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