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
		<?php echo $form->label($model,'creditorId'); ?>
		<?php echo $form->textField($model,'creditorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expenseName'); ?>
		<?php echo $form->textField($model,'expenseName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expenseDescription'); ?>
		<?php echo $form->textArea($model,'expenseDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expenseType'); ?>
		<?php echo $form->textField($model,'expenseType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expenseTotal'); ?>
		<?php echo $form->textField($model,'expenseTotal',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expensePaid'); ?>
		<?php echo $form->textField($model,'expensePaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expensePaidDate'); ?>
		<?php echo $form->textField($model,'expensePaidDate'); ?>
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

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->