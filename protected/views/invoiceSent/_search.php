<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoiceId'); ?>
		<?php echo $form->textField($model,'invoiceId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'method'); ?>
		<?php echo $form->textField($model,'method',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sentTime'); ?>
		<?php echo $form->textField($model,'sentTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sentTo'); ?>
		<?php echo $form->textField($model,'sentTo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->