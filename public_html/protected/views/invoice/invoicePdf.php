	
<div class="invoiceContainer">
	<table>
		<tr>
			<td>
				<ul>
					<li><?php echo CHtml::encode($data->client->name); ?></li>
					<li><?php echo CHtml::encode($data->client->contactInfo->address1); ?></li>
					<li><?php echo CHtml::encode($data->client->contactInfo->address2); ?></li>
				</ul>
				<ul>
					<li><?php echo CHtml::encode($data->client->contactInfo->city); ?></li>
					<li><?php echo CHtml::encode($data->client->contactInfo->state); ?>, 
					<?php echo CHtml::encode($data->client->contactInfo->postcode); ?></li>
				</ul>
			</td>
			<td>
				<ul>
					<li>Invoice #: <span class="invoiceContent"><?php echo CHtml::encode($data->id); ?></span></li>
					<li>Date: <span class="invoiceContent"><?php echo CHtml::encode($data->invoiceDate); ?></span></li>
					<li>Due date: <span class="invoiceContent"><?php echo CHtml::encode($data->dueDate); ?></span></li>
				</ul>
			</td>
		</tr>
	</table>
</div>

<table class="jobs">
	<tr><th>Job name</th><th>Qty</th><th class="alignRight">Rate</th><th class="alignRight">Total</th></tr>
	<?php foreach( $data->job as $job ) : ?>
	<tr><td><strong><?php echo CHtml::encode($job->jobName); ?></strong></td><td><?php echo $job->jobQuantity; ?></td>
	<td class="alignRight">$<?php echo number_format( $job->jobRate, 2); ?></td><td class="alignRight">$<?php echo number_format( $job->jobQuantity * $job->jobRate, 2 ); ?></td></tr>
	<tr><td colspan="4"> - <em><?php echo $job->jobDescription; ?></em></td></tr>
	<?php endforeach; ?>
	
	<?php if( Yii::app()->userInfo->gstEnabled == 1 ) : ?>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td class="alignRight">Total: (Ex GST)</td><td class="alignRight">$<?php echo number_format( $invoiceValues['TotalEx'], 2 ) ?></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td class="alignRight">GST: </td><td class="alignRight">$<?php echo number_format( $invoiceValues['GSTTotal'], 2 ) ?></td></tr>
	<?php endif; ?>

	<tr><td>&nbsp;</td><td>&nbsp;</td><td class="finalTotal">Total:</td><td class="finalTotal">$<?php echo number_format( $data->invoiceTotal, 2 ) ?></td></tr>

</table>
