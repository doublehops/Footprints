<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bas-period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periodStart'); ?>
        <?php Yii::import('application.widgets.CJuiDateTimePicker.CJuiDateTimePicker'); ?>
		<?php 
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'periodStart', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
                'language'=>'',
            )); ?>
		<?php echo $form->error($model,'periodStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periodEnd'); ?>
        <?php Yii::import('application.widgets.CJuiDateTimePicker.CJuiDateTimePicker'); ?>
		<?php 
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'periodEnd', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
                'language'=>'',
            )); ?>
		<?php echo $form->error($model,'periodEnd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
