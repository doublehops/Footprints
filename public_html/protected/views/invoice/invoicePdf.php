<?php

	ob_start();
	
	?>
	
	<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clientId')); ?>:</b>
	<?php echo CHtml::encode($data->client->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoiceDate')); ?>:</b>
	<?php echo CHtml::encode($data->invoiceDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dueDate')); ?>:</b>
	<?php echo CHtml::encode($data->dueDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoiceTotal')); ?>:</b>
	<?php echo CHtml::encode($data->invoiceTotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clientNotes')); ?>:</b>
	<?php echo CHtml::encode($data->clientNotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoiceNotes')); ?>:</b>
	<?php echo CHtml::encode($data->invoiceNotes); ?>
	<br />

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
	
	