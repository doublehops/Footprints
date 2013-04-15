<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('businessId')); ?>:</b>
	<?php echo CHtml::encode($data->businessId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseName')); ?>:</b>
	<?php echo CHtml::encode($data->expenseName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseDescription')); ?>:</b>
	<?php echo CHtml::encode($data->expenseDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseCode')); ?>:</b>
	<?php echo CHtml::encode($data->expenseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastModified')); ?>:</b>
	<?php echo CHtml::encode($data->lastModified); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lastUpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->lastUpdatedBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>