<?php
$this->breadcrumbs=array(
	'Invoice Payments',
);

$this->menu=array(
	array('label'=>'Create InvoicePayment', 'url'=>array('create')),
	array('label'=>'Manage InvoicePayment', 'url'=>array('admin')),
);
?>

<h1>Invoice Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
