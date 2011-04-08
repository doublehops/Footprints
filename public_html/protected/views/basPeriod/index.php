<?php
$this->breadcrumbs=array(
	'Bas Periods',
);

$this->menu=array(
	array('label'=>'Create BasPeriod', 'url'=>array('create')),
	array('label'=>'Manage BasPeriod', 'url'=>array('admin')),
);
?>

<h1>Bas Periods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
