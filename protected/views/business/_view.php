<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('businessName')); ?>:</b>
	<?php echo CHtml::encode($data->businessName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AssetPath')); ?>:</b>
	<?php echo CHtml::encode($data->AssetPath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gstEnabled')); ?>:</b>
	<?php echo CHtml::encode($data->gstEnabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gstRate')); ?>:</b>
	<?php echo CHtml::encode($data->gstRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeOffset')); ?>:</b>
	<?php echo CHtml::encode($data->timeOffset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<?php /*
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