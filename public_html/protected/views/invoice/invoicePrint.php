
<div class="invoiceContainer">
	<div class="invoiceInnerLeft">
		<h3>Client details:</h3>
		<ul>
			<li><?php echo CHtml::encode($data->client->name); ?></li>
			<li><?php echo CHtml::encode($data->client->contactInfo->address1); ?></li>
			<li><?php echo CHtml::encode($data->client->contactInfo->address2); ?></li>
			<li><?php echo CHtml::encode($data->client->contactInfo->city); ?></li>
			<li><?php echo CHtml::encode($data->client->contactInfo->state); ?>, 
			<?php echo CHtml::encode($data->client->contactInfo->postcode); ?></li>
		</ul>
	</div>

	<div class="invoiceInnerRight">
		<ul>
			<li>Invoice #: <span class="invoiceContent"><?php echo CHtml::encode($data->id); ?></span></li>
			<li>Date: <span class="invoiceContent"><?php echo CHtml::encode($data->invoiceDate); ?></span></li>
			<li>Due date: <span class="invoiceContent"><?php echo CHtml::encode($data->dueDate); ?></span></li>
		</ul>
	</div>
</div>

<table class="jobs">
	<tr><th>Job name</th><th>Qty</th><th>Rate</th><th>Total</th></tr>
	<?php foreach( $data->job as $job ) : ?>
	<tr><td><strong><?php echo CHtml::link(CHtml::encode($job->jobName), array('job/update', 'id'=>$job->id) ); ?></strong></td><td><?php echo $job->jobQuantity; ?></td>
	<td>$<?php echo number_format( $job->jobRate, 2); ?></td><td>$<?php echo number_format( $job->jobQuantity * $job->jobRate, 2 ); ?></td></tr>
	<tr><td colspan="4"> - <em><?php echo $job->jobDescription; ?></em></td></tr>
	<?php endforeach; ?>
	
	<?php if( Yii::app()->userInfo->gstEnabled == 1 ) : ?>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td>Total: (Ex GST)</td><td>$<?php echo number_format( $invoiceValues[0]['TotalEx'], 2 ) ?></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td>GST: </td><td>$<?php echo number_format( $invoiceValues[0]['GSTTotal'], 2 ) ?></td></tr>
	<?php endif; ?>

	<tr><td>&nbsp;</td><td>&nbsp;</td><td><strong>Total:</strong></td><td><strong>$<?php echo number_format( $data->invoiceTotal, 2 ) ?></strong></td></tr>

</table>
