<?php
$this->breadcrumbs=array(
	'Creditors',
);

$this->menu=array(
	array('label'=>'Create Creditor', 'url'=>array('create')),
	array('label'=>'Manage Creditor', 'url'=>array('admin')),
);
?>

<h1>Creditors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
