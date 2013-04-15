<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodStart')); ?>:</b>
	<?php echo CHtml::encode($data->periodStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodEnd')); ?>:</b>
	<?php echo CHtml::encode($data->periodEnd); ?>
	<br />


</div>