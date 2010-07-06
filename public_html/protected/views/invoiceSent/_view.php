<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoiceId')); ?>:</b>
	<?php echo CHtml::encode($data->invoiceId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('method')); ?>:</b>
	<?php echo CHtml::encode($data->method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sentTime')); ?>:</b>
	<?php echo CHtml::encode($data->sentTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sentTo')); ?>:</b>
	<?php echo CHtml::encode($data->sentTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />


</div>