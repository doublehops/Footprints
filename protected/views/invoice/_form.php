<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $model->id != NULL ? $model->id : 'New'; ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clientId'); ?>
		<?php echo $form->dropDownList($model,'clientId', CHtml::listData(Client::model()->findAll(array('condition'=>'businessId=:businessId','params'=>array(':businessId'=>Yii::app()->userInfo->business))) , 'id', 'name')); ?>
		<?php echo $form->error($model,'clientId'); ?>
	</div>

<?php Yii::import('application.widgets.CJuiDateTimePicker.CJuiDateTimePicker'); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'invoiceDate'); ?>
		<?php 
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'invoiceDate', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
                'language'=>'',
            )); ?>
		<?php echo $form->error($model,'invoiceDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dueDate'); ?>
		<?php 
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'dueDate', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
                'language'=>'',
            )); ?>
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

