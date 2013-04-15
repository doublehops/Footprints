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
		<?php echo $form->label($model,'jobName'); ?>
		<?php echo $form->textField($model,'jobName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jobDescription'); ?>
		<?php echo $form->textField($model,'jobDescription',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jobTypeId'); ?>
		<?php echo $form->textField($model,'jobTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jobRate'); ?>
		<?php echo $form->textField($model,'jobRate',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jobQuantity'); ?>
		<?php echo $form->textField($model,'jobQuantity',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jobNotes'); ?>
		<?php echo $form->textArea($model,'jobNotes',array('rows'=>6, 'cols'=>50)); ?>
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