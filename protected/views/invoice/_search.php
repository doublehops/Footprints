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
		<?php echo $form->label($model,'clientId'); ?>
		<?php echo $form->textField($model,'clientId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoiceDate'); ?>
		<?php echo $form->textField($model,'invoiceDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dueDate'); ?>
		<?php echo $form->textField($model,'dueDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoiceTotal'); ?>
		<?php echo $form->textField($model,'invoiceTotal',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clientNotes'); ?>
		<?php echo $form->textArea($model,'clientNotes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoiceNotes'); ?>
		<?php echo $form->textArea($model,'invoiceNotes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastModified'); ?>
		<?php echo $form->textField($model,'lastModified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastUpdatedBy'); ?>
		<?php echo $form->textField($model,'lastUpdatedBy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->