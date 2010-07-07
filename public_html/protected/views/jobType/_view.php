<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('businessId')); ?>:</b>
	<?php echo CHtml::encode($data->businessId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobName')); ?>:</b>
	<?php echo CHtml::encode($data->jobName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobDescription')); ?>:</b>
	<?php echo CHtml::encode($data->jobDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobRate')); ?>:</b>
	<?php echo CHtml::encode($data->jobRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobCode')); ?>:</b>
	<?php echo CHtml::encode($data->jobCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
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

	*/ ?>

</div>