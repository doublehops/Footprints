<?php
$this->breadcrumbs=array(
	'Payment Types',
);

$this->menu=array(
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
	array('label'=>'Manage PaymentMethod', 'url'=>array('admin')),
);
?>

<h1>Payment Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
