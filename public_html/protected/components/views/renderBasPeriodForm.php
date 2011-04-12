<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php //echo $form->labelEx($this->model, 'Period'); ?>
		<?php echo CHtml::dropDownList('period', 'selectedPeriod', $periods)?>
		<?php //echo $form->dropDownList(BasPeriod::model(),'basPeriod', CHtml::listData(BasPeriod::model()->findAll(array('order'=>'periodStart')) , 'id', 'title') ); ?>
		<?php //echo $form->error($this->$model,'expenseType'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Filter'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->