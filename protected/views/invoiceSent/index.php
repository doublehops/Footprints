<?php
$this->breadcrumbs=array(
	'Invoice Sents',
);

$this->menu=array(
	array('label'=>'Create InvoiceSent', 'url'=>array('create')),
	array('label'=>'Manage InvoiceSent', 'url'=>array('admin')),
);
?>

<h1>Invoice Sents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
