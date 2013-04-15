<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoiceId')); ?>:</b>
	<?php echo CHtml::encode($data->invoiceId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobName')); ?>:</b>
	<?php echo CHtml::encode($data->jobName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobDescription')); ?>:</b>
	<?php echo CHtml::encode($data->jobDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->jobTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobRate')); ?>:</b>
	<?php echo CHtml::encode($data->jobRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobQuantity')); ?>:</b>
	<?php echo CHtml::encode($data->jobQuantity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jobNotes')); ?>:</b>
	<?php echo CHtml::encode($data->jobNotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastModified')); ?>:</b>
	<?php echo CHtml::encode($data->lastModified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastUpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->lastUpdatedBy); ?>
	<br />

	*/ ?>

</div>