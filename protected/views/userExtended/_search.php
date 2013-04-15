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
		<?php echo $form->label($model,'uId'); ?>
		<?php echo $form->textField($model,'uId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currentBusinessId'); ?>
		<?php echo $form->textField($model,'currentBusinessId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeOffset'); ?>
		<?php echo $form->textField($model,'timeOffset',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastModified'); ?>
		<?php echo $form->textField($model,'lastModified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->