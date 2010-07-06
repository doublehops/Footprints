<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'clientId'); ?>
		<?php echo $form->dropDownList($model,'clientId', CHtml::listData(Client::model()->findAll() , 'id', 'name') ); ?>
		<?php echo $form->error($model,'clientId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoiceDate'); ?>
		<?php echo $form->textField($model,'invoiceDate'); ?>
		<?php echo $form->error($model,'invoiceDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dueDate'); ?>
		<?php echo $form->textField($model,'dueDate'); ?>
		<?php echo $form->error($model,'dueDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clientNotes'); ?>
		<?php echo $form->textArea($model,'clientNotes',array('rows'=>3, 'cols'=>80)); ?>
		<?php echo $form->error($model,'clientNotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoiceNotes'); ?>
		<?php echo $form->textArea($model,'invoiceNotes',array('rows'=>3, 'cols'=>80)); ?>
		<?php echo $form->error($model,'invoiceNotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?><?php //die( var_dump( $model->getStatusOptions() ));?>
		<?php echo $form->dropDownList($model,'status', $model->getStatusOptions()); ?>
		<?php echo $form->error($model,'status'); ?>
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