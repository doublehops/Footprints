<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uId')); ?>:</b>
	<?php echo CHtml::encode($data->uId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currentBusinessId')); ?>:</b>
	<?php echo CHtml::encode($data->currentBusinessId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeOffset')); ?>:</b>
	<?php echo CHtml::encode($data->timeOffset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastModified')); ?>:</b>
	<?php echo CHtml::encode($data->lastModified); ?>
	<br />


</div>