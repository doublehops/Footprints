<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditorId')); ?>:</b>
	<?php echo CHtml::encode($data->creditorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseName')); ?>:</b>
	<?php echo CHtml::encode($data->expenseName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseDescription')); ?>:</b>
	<?php echo CHtml::encode($data->expenseDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseType')); ?>:</b>
	<?php echo CHtml::encode($data->expenseType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expenseTotal')); ?>:</b>
	<?php echo CHtml::encode($data->expenseTotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjectGST')); ?>:</b>
	<?php echo CHtml::encode($data->subjectGST); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expensePaid')); ?>:</b>
	<?php echo CHtml::encode($data->expensePaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expensePaidDate')); ?>:</b>
	<?php echo CHtml::encode($data->expensePaidDate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastModified')); ?>:</b>
	<?php echo CHtml::encode($data->lastModified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastUpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->lastUpdatedBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>