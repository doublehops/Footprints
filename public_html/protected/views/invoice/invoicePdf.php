<?php

	ob_start();
	
?>
	
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
	<tr><td>&nbsp;</td><td>&nbsp;</td><td class="alignRight">Total: (Ex GST)</td><td class="alignRight">$<?php echo number_format( $invoiceValues[0]['TotalEx'], 2 ) ?></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td class="alignRight">GST: </td><td class="alignRight">$<?php echo number_format( $invoiceValues[0]['GSTTotal'], 2 ) ?></td></tr>
	<?php endif; ?>

	<tr><td>&nbsp;</td><td>&nbsp;</td><td class="finalTotal">Total:</td><td class="finalTotal">$<?php echo number_format( $data->invoiceTotal, 2 ) ?></td></tr>

</table>

	
	<?php 

	$content = ob_get_contents();
	ob_end_clean();

	$pdf = Yii::createComponent('application.extensions.tcpdf.tcpdf', 
	                            'P', 'cm', 'A4', true, 'UTF-8');
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor("Doublehops");
	$pdf->SetTitle("Doublehops Invoice #". $data->id);
	$pdf->SetSubject("Invoice");
	$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont("times", "BI", 20);
//	$pdf->Cell(0,10,$content,1,1,'C');
	$pdf->writeHTML($content, true, false, false, false, '');
	
	$pdf->Output("Doublehops Invoice #". $data->id .'.pdf', "I");
	
//	echo $content;