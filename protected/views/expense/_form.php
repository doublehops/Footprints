<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'creditorId'); ?>
		<?php echo $form->dropDownList($model,'creditorId', CHtml::listData(Creditor::model()->findAll(array('condition'=>'businessId=:businessId', 'order'=>'name','params'=>array(':businessId'=>Yii::app()->userInfo->business))) , 'id', 'name') ); ?>
		<?php echo $form->error($model,'creditorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseName'); ?>
		<?php echo $form->textField($model,'expenseName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'expenseName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseDescription'); ?>
		<?php echo $form->textArea($model,'expenseDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'expenseDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseType'); ?>
		<?php echo $form->dropDownList($model,'expenseType', CHtml::listData(ExpenseType::model()->findAll(array('condition'=>'businessId='.Yii::app()->userInfo->business,'order'=>'expenseName')) , 'id', 'expenseName') ); ?>
		<?php echo $form->error($model,'expenseType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expenseTotal'); ?>
		<?php echo $form->textField($model,'expenseTotal',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'expenseTotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subjectGST'); ?>
		<?php echo $form->checkbox($model,'subjectGST'); ?>
		<?php echo $form->error($model,'subjectGST'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capitalPurchase'); ?>
		<?php echo $form->checkbox($model,'capitalPurchase'); ?>
		<?php echo $form->error($model,'capitalPurchase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expensePaid'); ?>
		<?php echo $form->dropDownList($model,'expensePaid', $model->getStatusOptions()); ?>
		<?php echo $form->error($model,'expensePaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expensePaidDate'); ?>
        <?php Yii::import('application.widgets.CJuiDateTimePicker.CJuiDateTimePicker'); ?>
		<?php 
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'expensePaidDate', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array('dateFormat'=>'yy-mm-dd'), // jquery plugin options
                'language'=>'',
            )); ?>
		<?php echo $form->error($model,'expensePaidDate'); ?>
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
